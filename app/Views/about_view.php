<?= view('includes/header_view') ?>

<link rel="stylesheet" href="<?= base_url('public/css/pages/about_view.css') ?>">

<main class="about-main">
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="about-hero-text">
            <span class="heading-bow">🎀</span>
            <h1 class="about-title">About Thriftster</h1>
            <p class="about-subtitle">Curating delicate, vintage finds for your unique aesthetic ♡</p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="about-story">
        <div class="story-content">
            <h2>Our Story</h2>
            <p>
                Thriftster began with a simple idea: that fashion should be a love letter to yourself. In a world full of fast fashion, we wanted to create a whimsical, curated space where every piece feels special, intimate, and uniquely yours. 
            </p>
            <p>
                From lace trims to dreamy pastels, we hand-pick every item to ensure it fits the cottagecore, soft girly aesthetic that our community adores. We do the digging so you can focus on expressing your authentic self.
            </p>
        </div>
    </section>

    <!-- Meet The Team Section -->
    <section class="about-team">
        <div class="team-header">
            <span class="heading-bow">🌸</span>
            <h2>Meet The Team</h2>
            <p class="team-subtitle">The dreamers behind the curation</p>
        </div>

        <div class="team-grid">
            <!-- Team Member 1 -->
            <div class="team-card member-1">
                <div class="team-img-wrap">
                    <img src="<?= base_url('public/assets/includes/belle.png') ?>" onerror="this.src='https://ui-avatars.com/api/?name=Member+1&background=FFE4EC&color=E6A7B2&size=300'" alt="Team Member 1" class="team-img">
                </div>
                <div class="team-info">
                    <h3 class="team-name">Christabelle Jaynee Acedillo</h3>
                    <p class="team-role">Frontend Developer</p>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="team-card member-2">
                <div class="team-img-wrap">
                    <img src="<?= base_url('public/assets/includes/mica.png') ?>" onerror="this.src='https://ui-avatars.com/api/?name=Member+2&background=E4ECFF&color=A7B2E6&size=300'" alt="Team Member 2" class="team-img">
                </div>
                <div class="team-info">
                    <h3 class="team-name">Micaela Gonzales</h3>
                    <p class="team-role">Backend Developer</p>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="team-card member-3">
                <div class="team-img-wrap">
                    <img src="<?= base_url('public/assets/includes/richi.png') ?>" onerror="this.src='https://ui-avatars.com/api/?name=Member+3&background=FFE4F5&color=E6A7D9&size=300'" alt="Team Member 3" class="team-img">
                </div>
                <div class="team-info">
                    <h3 class="team-name">Richielle Ann Gutierrez</h3>
                    <p class="team-role">Frontend Developer</p>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="team-card member-4">
                <div class="team-img-wrap">
                    <img src="<?= base_url('public/assets/images/placeholder_member4.jpg') ?>" onerror="this.src='https://ui-avatars.com/api/?name=Member+4&background=F5EEE4&color=C4A882&size=300'" alt="Team Member 4" class="team-img">
                </div>
                <div class="team-info">
                    <h3 class="team-name">Shane Oxina</h3>
                    <p class="team-role">Frontend Developer</p>
                </div>
            </div>

            <!-- Team Member 5 -->
            <div class="team-card member-5">
                <div class="team-img-wrap">
                    <img src="<?= base_url('public/assets/includes/kerbi.jpg') ?>" onerror="this.src='https://ui-avatars.com/api/?name=Member+5&background=F0E8F5&color=B088C4&size=300'" alt="Team Member 5" class="team-img">
                </div>
                <div class="team-info">
                    <h3 class="team-name">Quervie Manrique</h3>
                    <p class="team-role">Backend Developer</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?= view('includes/footer_view') ?>
