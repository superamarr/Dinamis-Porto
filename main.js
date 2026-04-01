import TubesCursor from "https://cdn.jsdelivr.net/npm/threejs-components@0.0.19/build/cursors/tubes1.min.js"

let app

document.addEventListener('DOMContentLoaded', () => {

  const canvas = document.getElementById('canvas')

  app = TubesCursor(canvas, {
    tubes: {
      colors: ["#f967fb", "#e3f306", "#6958d5"],
      lights: {
        intensity: 200,
        colors: ["#83f36e", "#fe8a2e", "#ff008a", "#60aed5"]
      }
    }
  })

})

document.body.addEventListener('click', (e) => {
  const colors = randomColors(3)
  const lightsColors = randomColors(3)
  console.log(colors, lightsColors)
  app.tubes.setColors(colors)
  app.tubes.setLightsColors(lightsColors)
})

function randomColors(count) {
  return new Array(count)
    .fill(0)
    .map(() => "#" + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0'))
}

const hero = document.querySelector('.hero')
document.addEventListener('DOMContentLoaded', () => {

  const topnav = document.getElementById('topnav')
  const indicator = document.querySelector('.scroll-indicator')

  if (!topnav || !indicator) {
    console.log('Element tidak ditemukan')
    return
  }

  window.addEventListener('scroll', () => {
    const scrolled = window.scrollY > 10
    topnav.classList.toggle('show', scrolled)
    indicator.classList.toggle('hide', scrolled)
  })

})

if (window.Vue && window.Vue.createApp) {
  const fallbackState = {
    hero: {
      fullName: 'Taufik Ramadhani',
      callName: 'Taufik',
      taglineTop: "I'm a fullstack developer, data analyst,",
      taglineBottom: 'ai enthusiast',
    },
    profile: {
      name: 'Taufik Ramadhani',
      roleText: 'Fullstack Developer · Data Analyst · AI Enthusiast',
      locationText: '📍 Samarinda, Indonesia',
      dicodingUrl: 'https://www.dicoding.com/users/zzeekkuu',
      photoPath: 'assets/images/Taufik Ramadhani.png',
    },
    aboutText:
      "Hey, I'm Taufik Ramadhani, though most people simply call me Taufik.\nI'm a fullstack developer, data analyst, and AI enthusiast based in Indonesia.\nI'm passionate about building scalable systems, transforming data\ninto meaningful insights, and turning ideas into functional digital products.\nI'm constantly exploring emerging technologies and pushing myself\nto grow through innovative and creative problem-solving.",
    skills: [
      { id: 1, name: 'JavaScript', percent: 85 },
      { id: 2, name: 'React.js', percent: 80 },
      { id: 3, name: 'Laravel', percent: 75 },
      { id: 4, name: 'Next.js', percent: 78 },
      { id: 5, name: 'Golang', percent: 60 },
      { id: 6, name: 'Flutter', percent: 65 },
    ],
    experiences: [
      {
        id: 1,
        role: 'Full Stack Developer',
        timeRange: 'Feb 2026 — Saat ini',
        org: 'Coding Camp powered by DBS Foundation · Magang · Samarinda, Kalimantan Timur · Jarak jauh',
        description: 'React.js, Node.js, dan teknologi terkait.',
      },
      {
        id: 2,
        role: 'Laboratory Assistant: Data Analytics and Visualization',
        timeRange: 'Feb 2026 — Saat ini',
        org: 'Universitas Mulawarman · Kontrak · Samarinda, Kalimantan Timur',
        description: 'Tableau · Pendampingan praktikum analitik dan visualisasi data.',
      },
      {
        id: 3,
        role: 'Laboratory Assistant: Fundamentals of Programming',
        timeRange: 'Agu 2025 — Jan 2026 · 6 bln',
        org: 'Universitas Mulawarman · Kontrak · Samarinda, Kalimantan Timur',
        description: 'Python · Pendampingan praktikum dasar pemrograman.',
      },
      {
        id: 4,
        role: 'Staff of Department Professional Skill Development',
        timeRange: 'Feb 2025 — Jan 2026 · 1 thn',
        org: 'Information System Association (INFORSA) · Kontrak · Samarinda, Kalimantan Timur',
        description: 'Laravel, PHP, dan pengembangan kemampuan profesional.',
      },
    ],
    certs: [
      {
        id: 1,
        title: 'The Python Programmer 2025',
        issuer: 'Udemy',
        year: '2024',
        src: 'assets/images/PythonProgrammer.jpeg',
        link: 'assets/images/PythonProgrammer.jpeg',
      },
      {
        id: 2,
        title: 'Pemrograman untuk Pengembang Software',
        issuer: 'Dicoding',
        year: '2026',
        src: 'assets/images/SoftwareDev.png',
        link: 'assets/images/SoftwareDev.png',
      },
      {
        id: 3,
        title: 'Data Visualization with Python',
        issuer: 'Udemy',
        year: '2025',
        src: 'assets/images/Data Analyst.jpeg',
        link: 'assets/images/Data Analyst.jpeg',
      },
    ],
    settings: {
      copyrightYear: 2025,
      ownerName: 'Taufik Ramadhani',
      portfolioUrl: 'https://www.dicoding.com/users/zzeekkuu',
      portfolioLabel: 'Portofolio',
    },
  }

  const vueApp = window.Vue.createApp({
    data() {
      return { ...fallbackState }
    },
    async mounted() {
      try {
        const res = await fetch('api/site-content.php', { cache: 'no-store' })
        if (!res.ok) throw new Error(`API failed with status ${res.status}`)
        const data = await res.json()

        if (data.hero) this.hero = data.hero
        if (data.profile) this.profile = data.profile
        if (typeof data.aboutText === 'string') this.aboutText = data.aboutText
        if (Array.isArray(data.skills)) this.skills = data.skills
        if (Array.isArray(data.experiences)) this.experiences = data.experiences
        if (Array.isArray(data.certs)) this.certs = data.certs
        if (data.settings) this.settings = data.settings
      } catch (err) {
        console.warn('Gagal mengambil konten dari API, pakai fallback.', err)
      }
    },
  })

  // Reusable component: render skill progress bars (Vue manages the data)
  vueApp.component('skill-item', {
    props: ['skill'],
    template: `
      <div class="h-100">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span class="skill-label text-white">{{ skill.name }}</span>
          <span class="skill-value text-white-50 fw-semibold">{{ skill.percent }}%</span>
        </div>
        <div class="progress" role="progressbar"
          :aria-valuenow="skill.percent" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" :style="{ width: skill.percent + '%' }"></div>
        </div>
      </div>
    `
  })

  // Reusable component: render certificate cards (hover + Bootstrap card layout)
  vueApp.component('certificate-card', {
    props: ['cert'],
    template: `
      <article class="card hover-card h-100 bg-transparent">
        <img class="card-img-top" :src="cert.src" :alt="cert.title">
        <div class="card-body d-flex flex-column gap-2">
          <div class="cert-title">{{ cert.title }}</div>
          <div class="cert-issuer">{{ cert.issuer }}</div>
          <div class="cert-date">{{ cert.year }}</div>
          <a class="btn btn-sm btn-outline-warning mt-auto align-self-start"
            :href="cert.link" target="_blank" rel="noopener noreferrer">view</a>
        </div>
      </article>
    `
  })

  vueApp.mount('#app')
}
