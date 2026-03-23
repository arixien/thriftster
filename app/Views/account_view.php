<?= view('includes/header_view') ?>

<main style="padding:2rem 0;background:#faf5f6;min-height:100vh;">
<div class="container" style="max-width:700px;">

  <h1 style="font-size:22px;font-weight:600;color:#3a2d30;margin-bottom:1.5rem;">My Account</h1>

  <div style="background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:1.5rem;margin-bottom:1rem;">
    <h2 style="font-size:15px;font-weight:600;color:#3a2d30;margin-bottom:1rem;">Account details</h2>
    <table style="width:100%;font-size:14px;">
      <tr>
        <td style="color:#9e7880;padding:6px 0;width:140px;">Username</td>
        <td style="color:#3a2d30;font-weight:500;">@<?= esc(session()->get('username')) ?></td>
      </tr>
      <tr>
        <td style="color:#9e7880;padding:6px 0;">Name</td>
        <td style="color:#3a2d30;"><?= esc(session()->get('user_name') ?? '—') ?></td>
      </tr>
    </table>
  </div>

  <div style="background:#fff;border:0.5px solid #e8d4d8;border-radius:12px;padding:1.5rem;margin-bottom:1rem;">
    <h2 style="font-size:15px;font-weight:600;color:#3a2d30;margin-bottom:1rem;">Quick links</h2>
    <div style="display:flex;flex-direction:column;gap:8px;">
      <a href="<?= base_url('/orders') ?>"
         style="display:flex;justify-content:space-between;align-items:center;padding:12px;border:0.5px solid #e8d4d8;border-radius:8px;text-decoration:none;color:#3a2d30;font-size:14px;">
        My Orders <span style="color:#9e7880;">›</span>
      </a>
      <a href="<?= base_url('/profile') ?>"
         style="display:flex;justify-content:space-between;align-items:center;padding:12px;border:0.5px solid #e8d4d8;border-radius:8px;text-decoration:none;color:#3a2d30;font-size:14px;">
        Edit Profile <span style="color:#9e7880;">›</span>
      </a>
      <a href="<?= base_url('/auth/logout') ?>"
         style="display:flex;justify-content:space-between;align-items:center;padding:12px;border:0.5px solid #fdd;border-radius:8px;text-decoration:none;color:#c0404a;font-size:14px;">
        Sign Out <span>›</span>
      </a>
    </div>
  </div>

</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>