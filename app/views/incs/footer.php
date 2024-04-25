  <footer class="footer" id="contacts">
    <div class="footer-info">
      <a href="index.php">Главная</a>
      <a href="policy">Политика конфиденциальности</a>
      <a href="terms">Пользовательское соглашение</a>
      <a>Безопасность платежей</a>
    </div>
    <div class="footer-info2">
      <div class="socials">
        <a href="#">
          <img class="link-img" src="assets/img/telegram-line.png" alt="telegram">
        </a>
        <a href="#">
          <img class="link-img" src="assets/img/instagram-line.png" alt="instagram">
        </a>
        <a href="#">
          <img class="link-img" src="assets/img/whatsapp-line.png" alt="whatsapp">
        </a>
        <a href="#">
          <img class="link-img" src="assets/img/vk-line.png" alt="vk">
        </a>
      </div>
      <p>ПНПД Ни Нелли Чимитовна</p>
      <p>inbox@invitte.ru</p>
      <p>Invitte <?= date("Y") ?></p>  
    </div>
  </footer>
  </div>
  <script>
    const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
    document.cookie = `timezone=${tz}`;
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <script src="https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script> 
  <script src="assets/scripts/main.js"></script> 
  <?php if(isset($useSplitType)): ?>
  <script src="https://unpkg.com/split-type"></script>
  <?php endif; ?>
  <?php if(isset($scriptFile)): ?>
  <script src="assets/scripts/<?= $scriptFile ?>"></script>
  <?php endif; ?>
 
</body>
</html>