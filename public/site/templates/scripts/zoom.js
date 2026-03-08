document.addEventListener('DOMContentLoaded', () => {
  const images = document.querySelectorAll('img[data-js="image"]')

  const lightbox = document.createElement('div')
  lightbox.className = 'lightbox'
  document.body.appendChild(lightbox)

  const img = document.createElement('img')
  img.draggable = false
  img.style.cursor = 'grab'
  img.style.userSelect = 'none'
  img.style.touchAction = 'none'
  img.style.transformOrigin = 'center center'
  lightbox.appendChild(img)

  const closeBtn = document.createElement('button')
  closeBtn.className = 'lightbox-close'
  closeBtn.innerHTML = '&times;'
  closeBtn.setAttribute('aria-label', 'Close image')
  lightbox.appendChild(closeBtn)

  closeBtn.addEventListener('click', (e) => {
    e.stopPropagation()
    lightbox.classList.remove('show')
    document.body.classList.remove('no-scroll')
  })

  const controls = document.createElement('div')
  controls.className = 'lightbox-controls'
  controls.innerHTML = `
    <button id="zoom-out">−</button>
    <button id="reset"><img src="/site/templates/assets/icons/zoom-out.svg" alt=""></button>
    <button id="zoom-in">+</button>
  `
  lightbox.appendChild(controls)

  let scale = 1
  const ZOOM_STEP = 0.25
  const MAX_ZOOM = 5
  const MIN_ZOOM = 0.25

  let isDragging = false
  let startX = 0; let startY = 0
  let translateX = 0; let translateY = 0
  let activePointerId = null
  let lightboxRect = null

  function updateTransform () {
    img.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`
  }

  function clampTranslate () {
    if (!lightboxRect) return

    const rect = img.getBoundingClientRect()
    const imgWidth = rect.width
    const imgHeight = rect.height
    const boxWidth = lightboxRect.width
    const boxHeight = lightboxRect.height

    const maxX = Math.max(0, (imgWidth - boxWidth) / 2)
    const maxY = Math.max(0, (imgHeight - boxHeight) / 2)

    translateX = Math.min(maxX, Math.max(-maxX, translateX))
    translateY = Math.min(maxY, Math.max(-maxY, translateY))
  }

  images.forEach(image => {
    image.style.cursor = 'zoom-in'
    image.addEventListener('click', () => {
      img.src = image.src
      scale = 1
      translateX = 0
      translateY = 0
      img.style.transition = 'transform 0.2s ease'
      lightbox.classList.add('show')
      document.body.classList.add('no-scroll')

      img.onload = () => {
        lightboxRect = lightbox.getBoundingClientRect()
        updateTransform()
      }
    })
  })

  lightbox.addEventListener('click', e => {
    if (e.target === lightbox) {
      lightbox.classList.remove('show')
      document.body.classList.remove('no-scroll')
    }
  })

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      lightbox.classList.remove('show')
      document.body.classList.remove('no-scroll')
    }
  })

  function applyZoom (newScale) {
    scale = Math.min(MAX_ZOOM, Math.max(MIN_ZOOM, newScale))
    img.style.transition = 'transform 0.2s ease'
    clampTranslate()
    updateTransform()
  }

  document.getElementById('zoom-in').addEventListener('click', e => {
    e.stopPropagation()
    applyZoom(scale + ZOOM_STEP)
  })

  document.getElementById('zoom-out').addEventListener('click', e => {
    e.stopPropagation()
    applyZoom(scale - ZOOM_STEP)
    if (scale === 1) {
      translateX = 0
      translateY = 0
      updateTransform()
    }
  })

  document.getElementById('reset').addEventListener('click', e => {
    e.stopPropagation()
    scale = 1
    translateX = 0
    translateY = 0
    img.style.transition = 'transform 0.2s ease'
    updateTransform()
  })

  img.addEventListener('pointerdown', (e) => {
    if (scale <= 1) return
    isDragging = true
    activePointerId = e.pointerId
    img.style.cursor = 'grabbing'
    img.style.transition = 'none'
    try { img.setPointerCapture(activePointerId) } catch (_) {}
    startX = e.clientX - translateX
    startY = e.clientY - translateY
    e.preventDefault()
  })

  document.addEventListener('pointermove', (e) => {
    if (!isDragging || e.pointerId !== activePointerId) return
    translateX = e.clientX - startX
    translateY = e.clientY - startY
    clampTranslate()
    updateTransform()
  }, { passive: false })

  function endPointer (e) {
    if (!isDragging || (activePointerId !== null && e.pointerId !== activePointerId)) return
    isDragging = false
    activePointerId = null
    img.style.cursor = 'grab'
    try { img.releasePointerCapture(e.pointerId) } catch (_) {}
  }

  document.addEventListener('pointerup', endPointer)
  document.addEventListener('pointercancel', endPointer)

  let initialDistance = 0
  let initialScale = 1

  img.addEventListener('touchstart', (e) => {
    if (e.touches.length === 2) {
      const dx = e.touches[0].clientX - e.touches[1].clientX
      const dy = e.touches[0].clientY - e.touches[1].clientY
      initialDistance = Math.hypot(dx, dy)
      initialScale = scale
    }
  }, { passive: false })

  img.addEventListener('touchmove', (e) => {
    if (e.touches.length === 2) {
      e.preventDefault()
      const dx = e.touches[0].clientX - e.touches[1].clientX
      const dy = e.touches[0].clientY - e.touches[1].clientY
      const distance = Math.hypot(dx, dy)
      const pinchScale = distance / initialDistance
      applyZoom(initialScale * pinchScale)
    }
  }, { passive: false })

  window.addEventListener('resize', () => {
    if (lightbox.classList.contains('show')) {
      lightboxRect = lightbox.getBoundingClientRect()
      clampTranslate()
      updateTransform()
    }
  })
})
