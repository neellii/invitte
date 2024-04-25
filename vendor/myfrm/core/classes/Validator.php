<?php 

namespace myfrm;

use PDO;
use PDOException;
use PDOStatement;

  class Validator {

    protected $errors = [];
    protected $data_items;
    protected $rules_list = ['required', 'min', 'max', 'email', 'match', 'unique', 'ext', 'size', 'slug', 'hex', 'date_timer', 'oldValue', 'priceRange'];
    protected $messages = [
      'required' => 'Поле обязательно к заполнению/отметке',
      'min' => 'Поле должно содержать минимум :rulevalue: букв(ы)',
      'max' => 'Поле должно содержать максимум :rulevalue: букв(ы)',
      'email' => 'Недействительный email',
      'match' => 'The :fieldname: field must match :rulevalue: field',
      'unique' => 'Значение уже занято',
      'ext' => 'Формат файла не поддерживается. Разрешенные форматы :rulevalue:',
      'size' => 'Размер файла слишком большой. Загрузите сжатый файл или выберите другой файл. Разрешено :rulevalue: байт',
      'slug' => 'Текст ссылки может содержать только латиницу, цифры и дефис(-)',
      'hex' => 'Неправильный формат. Конвертируйте цвет в hex формат',
      'date_timer' => 'Введите дату в следующем формате: гггг-мм-дд. Например: 2024-08-01',
      'oldValue' => 'Текст ссылки уже занят',
      'priceRange' => 'Выберите период'
    ]; // :placeholder: will fill that in a check method with a neede value

    public function validate($data = [], $rules = []) {
      $this->data_items = $data;
      foreach($data as $fieldname => $value) {
        if(isset($rules[$fieldname])) {
          $this->check([
            'fieldname' => $fieldname,
            'value' => $value,
            'rules' => $rules[$fieldname],
          ]);
        }
      };

      return $this;
    }

    protected function check($field) {
      foreach ($field['rules'] as $rule => $rule_value) {
        if(in_array($rule, $this->rules_list)) {
           if(!call_user_func_array([$this, $rule], [$field['value'], $rule_value])) {
              $this->addError($field['fieldname'], str_replace([':fieldname:', ':rulevalue:'], 
              [$field['fieldname'], $rule_value], $this->messages[$rule]));
           } 
        }
      }
    }

    protected function addError($fieldname, $error) {
      $this->errors[$fieldname][] = $error;
    }

    public function getErrors() {
      return $this->errors;
    }


    public function hasErrors() {
      return !empty($this->errors);
    }

    public function listErrors($fieldname) {
      $output = '';

      if(isset($this->errors[$fieldname])) {
        $output .= "<div class='error-message'><ul>";
        foreach($this->errors[$fieldname] as $error) {
          $output .= "<li class='error-li'>{$error}</li>";
        }
        $output .= "</ul></div>";
        echo "<script>document.querySelector('.error-message').scrollIntoView({block: 'center'})</script>";
      }

      return $output;
    }

    //validation methods - names of validation functions should be the same as in a rules_list + same as in a rules-array

    protected function required($value, $rule_value) { 
      return !empty($value);
    }

    protected function min($value, $rule_value) {
      return mb_strlen($value, 'UTF-8') >= $rule_value;
    }

    protected function max($value, $rule_value) {
      return mb_strlen($value, 'UTF-8') <= $rule_value;
    }

    protected function email($value, $rule_value) {
      return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    protected function match($value, $rule_value) {
      return $value === $this->data_items[$rule_value];
    }

    protected function slug($value, $rule_value) {
      return preg_match('/^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*$/', $value);
    }

    protected function hex($value) {
      if(empty($value['1'])) {
        return true;
      } else {
        $res = 1;
        foreach($value as $k => $v) {
          if(!preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $v)) {
            $res = 0;
          }
        }
        return $res;
      }
    }

    protected function date_timer($value, $rule_value) {
      if(empty($value)) {
        return true;
      } else {
        return preg_match('/^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/', $value);
      }
    }

    protected function unique($value, $rule_value) {
      $data = explode(':', $rule_value);
      return (!db()->query("SELECT `{$data[1]}` FROM `{$data[0]}` WHERE {$data[1]} = ?", [$value])->getColumn());
    }

    protected function oldValue($value, $rule_value) {
      $data = explode(':', $rule_value);
      if(db()->query("SELECT `{$data[1]}` from `{$data[0]}` WHERE {$data[1]} = ?", [$data[2]])->getColumn() === $value) {
        return true;
      } elseif(!db()->query("SELECT `{$data[1]}` FROM `{$data[0]}` WHERE {$data[1]} = ?", [$value])->getColumn()) {
        return true;
      } else {
        return false;
      }
    }

    protected function ext($value, $rule_value) {
      if(empty($value['name'])) {
        return true;
      }
      $file_ext = getFileExt($value['name']);
      $allowed_exts = explode('|', $rule_value);
      return in_array($file_ext, $allowed_exts);
    }

    protected function size($value, $rule_value) {
      if(empty($value['size'])) {
        return true;
      }
      return $value['size'] <= $rule_value;
    }

    protected function priceRange($value, $rule_value) {
      return in_array($value, $rule_value);
    }
  }