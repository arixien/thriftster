<!-- ===== SITE FOOTER ===== -->
<link rel="stylesheet" href="<?= base_url('public/css/includes/footer_view.css') ?>">
<footer class="site-footer">
    <div class="footer-content container-fluid">
        <div class="footer-logo-wrap">
            <div class="footer-logo-badge">
                <img src="public/assets/includes/logo.png" alt="Logo" class="img-fluid" onerror="this.style.display='none';this.nextElementSibling.style.display='block'">
                <span class="logo-fallback" style="display:none; color: #4A3C41;">✿</span>
            </div>
            <div class="footer-logo-text">
                <span class="footer-logo-name">ThriftSter</span>
                <span class="footer-logo-desc">Thriftster is your space for delicate, curated vintage finds — where every piece is soft, feminine, and uniquely yours.</span>
                <button onclick="window.location.href='<?= base_url('about') ?>'" class="about-us-btn">
                    About Us <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </div>
        
        <div class="footer-divider"></div>
        <div class="footer-copyright">
            &copy; <?= date('Y') ?> Thriftster | All rights reserved.
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
