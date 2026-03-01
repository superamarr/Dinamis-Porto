// Licence CC BY-NC-SA 4.0
// Attribution — You must give appropriate credit.
// Non Commercial — You may not use the material for commercial purposes.

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

/*
// Bento menu toggle
const bentoBtn = document.getElementById('bentoBtn')
const navOverlay = document.getElementById('navOverlay')

bentoBtn.addEventListener('click', (e) => {
  e.stopPropagation()
  bentoBtn.classList.toggle('active')
  navOverlay.classList.toggle('open')
})

// Close overlay when clicking on a nav link
navOverlay.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', () => {
    bentoBtn.classList.remove('active')
    navOverlay.classList.remove('open')
  })
})
*/

document.body.addEventListener('click', (e) => {
  // Don't change colors when clicking bento or nav (uncomment if using bento nav)
  // if (e.target.closest('.bento-btn') || e.target.closest('.nav-overlay')) return
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
  const vueApp = window.Vue.createApp({
    data() {
      return {
        skills: [
          { name: 'JavaScript', percent: 85 },
          { name: 'React.js', percent: 80 },
          { name: 'Laravel', percent: 75 },
          { name: 'Next.js', percent: 78 },
          { name: 'Golang', percent: 60 },
          { name: 'Flutter', percent: 65 },
        ],
        certs: [
          {
            title: 'The Python Programmer 2025',
            issuer: 'Udemy',
            year: '2024',
            src: 'assets/images/PythonProgrammer.jpeg',
            link: 'assets/images/PythonProgrammer.jpeg',
          },
          {
            title: 'Pemrograman untuk Pengembang Software',
            issuer: 'Dicoding',
            year: '2026',
            src: 'assets/images/SoftwareDev.png',
            link: 'assets/images/SoftwareDev.png',
          },
          {
            title: 'Data Visualization with Python',
            issuer: 'Udemy',
            year: '2025',
            src: 'assets/images/Data Analyst.jpeg',
            link: 'assets/images/Data Analyst.jpeg',
          },
        ],
      }
    },
  })
  vueApp.mount('#app')
}
