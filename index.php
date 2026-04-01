<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taufik Ramadhani — Portfolio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;800&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div id="app">
    <canvas id="canvas"></canvas>

    <!-- ===== HEADER + NAV ===== -->
    <header class="topnav" id="topnav">
      <nav class="navbar navbar-expand-lg p-0">
        <ul class="navbar-nav flex-row align-items-center gap-3 m-0">
          <li class="nav-item"><a class="nav-link px-0" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link px-0" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link px-0" href="#experience">Experience</a></li>
          <li class="nav-item"><a class="nav-link px-0" href="#certificates">Certificates</a></li>
          <li class="nav-item">
            <a :href="profile.dicodingUrl" target="_blank" rel="noopener noreferrer"
                class="nav-link dicoding-link px-0">Dicoding</a>
          </li>
        </ul>
      </nav>
    </header>

    <!-- ===== HERO ===== -->
    <div class="hero">
      <h1><span class="outline">HEY, I'M</span> {{ hero.fullName }}</h1>
      <h2><span class="outline">BUT YOU CAN CALL ME</span> {{ hero.callName }}</h2>
      <p>{{ hero.taglineTop }}<br>& {{ hero.taglineBottom }}</p>
      <div class="links">
        <a href="#about">→ more about me</a>
      </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <main>

      <!-- About Section -->
      <section class="about" id="about">
        <div class="about-wrapper">

          <!-- ASIDE: Profile photo & biodata -->
          <aside class="profile-aside">
            <div class="aside-photo-wrap">
              <div class="photo-card"></div>
              <img class="profile-photo" :src="profile.photoPath" :alt="profile.name">
            </div>
            <div class="aside-bio">
              <p class="aside-name">{{ profile.name }}</p>
              <p class="aside-role">{{ profile.roleText }}</p>
              <p class="aside-location">{{ profile.locationText }}</p>
              <a class="aside-dicoding" :href="profile.dicodingUrl" target="_blank"
                rel="noopener noreferrer">🔗 Dicoding Profile</a>
            </div>
          </aside>

          <!-- ARTICLE: About content -->
          <article class="about-article">
            <h2 class="section-title">ABOUT</h2>
            <hr>
            <p>{{ aboutText }}</p>
            <div class="about-skills">
              <div class="row g-3 skills-grid">
                <div class="col-12 col-md-6" v-for="skill in skills" :key="skill.id">
                  <skill-item :skill="skill" />
                </div>
              </div>
            </div>
          </article>

        </div>
      </section>

      <!-- Experience Section -->
      <section class="experience" id="experience">
        <div class="experience-content">
          <h2 class="section-title">EXPERIENCE</h2>
          <hr>
          <ul class="exp-list">
            <li v-for="exp in experiences" :key="exp.id">
              <div class="exp-head">
                <span class="exp-role">{{ exp.role }}</span>
                <span class="exp-time">{{ exp.timeRange }}</span>
              </div>
              <div class="exp-org">{{ exp.org }}</div>
              <p class="exp-desc">{{ exp.description }}</p>
            </li>
          </ul>
        </div>
      </section>

      <!-- Certificates Section -->
      <section class="certificates" id="certificates">
        <div class="cert-content">
          <h2 class="section-title">CERTIFICATES</h2>
          <hr>
          <div class="row g-3 certs-grid">
            <div class="col-12 col-md-6 col-lg-4" v-for="cert in certs" :key="cert.id">
              <certificate-card :cert="cert" />
            </div>
          </div>
        </div>
      </section>

    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="site-footer">
      <p>© {{ settings.copyrightYear }} {{ settings.ownerName }} · <a :href="settings.portfolioUrl" target="_blank"
          rel="noopener noreferrer">{{ settings.portfolioLabel }}</a></p>
    </footer>

    <!-- Scroll indicator -->
    <div class="scroll-indicator">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script type="module" src="main.js"></script>
</body>

</html>
