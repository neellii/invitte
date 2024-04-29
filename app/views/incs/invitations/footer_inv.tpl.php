<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
<script src="../public/invitations/scripts/general.js"></script>
<?php if(isset($demo)): ?>
<script src="<?= "../public/invitations/scripts/script-{$template_id}.js" ?>"></script>
<?php else: ?>
<script src="<?= "../public/invitations/scripts/script-{$data['template_id']}.js" ?>"></script>
<?php endif; ?>
<script src="../public/invitations/scripts/rsvp.js"></script>
<script src="../public/invitations/scripts/animations.js"></script>
</body>
</html>