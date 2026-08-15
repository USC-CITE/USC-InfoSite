document.addEventListener('DOMContentLoaded', function () {
  const headerAccordCont = document.querySelector('[data-js=header_accord_container]')
  const headerAccord = document.querySelector('[data-js=header_accord]')

  const menuIcon = document.querySelector('[data-js=menu_btn_icon]')
  const menuBtn = document.querySelector('[data-js=menu_btn]')

  const infoMenu = document.querySelector('[data-js=info_menu]')
  const srvcsMenu = document.querySelector('[data-js=srvcs_menu]')

  const searchBtn = document.querySelector('[data-js=search_btn]')
  const searchForm = document.querySelector('[data-js=search_form]')

  menuBtn.setAttribute('role', 'button')
  searchBtn.setAttribute('role', 'button')

  // Keyboard support for menu button (Space and Enter)
  menuBtn.addEventListener('keydown', function (e) {
    if (e.keyCode === 32 || e.keyCode === 13) {
      // Space or Enter key
      e.preventDefault()
      this.click()
    }
  })

  // Keyboard support for search button (Space and Enter)
  searchBtn.addEventListener('keydown', function (e) {
    if (e.keyCode === 32 || e.keyCode === 13) {
      // Space or Enter key
      e.preventDefault()
      this.click()
    }
  })

  // Event listener for clicking the search link
  searchBtn.addEventListener('click', function (e) {
    e.preventDefault()
    // Toggle the visibility of the search bar and hide menu contents
    infoMenu.classList.remove('visible')
    srvcsMenu.classList.remove('visible')

    headerAccord.classList.remove('header_accord--menu')
    headerAccord.classList.add('header_accord--search')

    // Toggle the icon and background color based on the visibility of the search bar
    if (!searchForm.classList.contains('visible')) {
      headerAccordCont.style.borderBottom = '3px solid #D9D4D7'
      searchForm.classList.add('visible')
      searchBtn.setAttribute('aria-expanded', 'true')
      menuBtn.setAttribute('aria-expanded', 'false')

      // Set background color to #f6f6f6 when search link is clicked
      searchBtn.classList.add('selected')
      // Revert background color of the menu button when search link is clicked
      menuIcon.style.transform = 'none'
      menuBtn.classList.remove('selected')
    } else {
      headerAccordCont.style.borderBottom = 'none'
      headerAccord.classList.remove('header_accord--search')
      searchForm.classList.remove('visible')
      searchBtn.setAttribute('aria-expanded', 'false')

      // Revert background color of the search link when search bar is closed
      searchBtn.classList.remove('selected')
    }
  })

  // Event listener for clicking the menu button
  menuBtn.addEventListener('click', function (e) {
    e.preventDefault()
    headerAccord.classList.add('header_accord--menu')
    headerAccord.classList.remove('header_accord--search')
    searchForm.classList.remove('visible')

    // Toggle the icon and background color based on the visibility of infoMenu
    if (!infoMenu.classList.contains('visible')) {
      headerAccordCont.style.borderBottom = '3px solid #D9D4D7'
      infoMenu.classList.add('visible')
      srvcsMenu.classList.add('visible')
      menuBtn.setAttribute('aria-expanded', 'true')
      searchBtn.setAttribute('aria-expanded', 'false')

      menuIcon.style.transform = 'rotate(-180deg)'
      menuBtn.classList.add('selected')
      // Revert background color of the search link when menu button is clicked
      searchBtn.classList.remove('selected')
    } else {
      headerAccordCont.style.borderBottom = 'none'
      headerAccord.classList.remove('header_accord--menu')
      infoMenu.classList.remove('visible')
      srvcsMenu.classList.remove('visible')
      menuBtn.setAttribute('aria-expanded', 'false')

      menuIcon.style.transform = 'none'
      menuBtn.classList.remove('selected')
    }
  })

  const reportBtn = document.querySelector('.main__report')
  const reportFrm = document.querySelector('.report_form')

  reportBtn.setAttribute('role', 'button')

  reportBtn.addEventListener('click', function () {
    reportFrm.style.display = 'flex'
    this.style.display = 'none'
  })

  reportBtn.addEventListener('keydown', function (e) {
    if (e.keyCode === 32 || e.keyCode === 13) {
      // Space or Enter key
      reportFrm.style.display = 'flex'
      reportFrm.focus()
      this.style.display = 'none'
    }
  })
})

// Cookies Banner
document.addEventListener('DOMContentLoaded', function () {
  const dialog = document.querySelector('[data-js-cookies-dialog]')
  const acceptBtn = document.querySelector('[data-js-cookies-accept]')
  const denyBtn = document.querySelector('[data-js-cookies-deny]')
  let overlay

  function insertCookieScripts () {
    if (window.localStorage.getItem('cookiesChoice') === 'accepted') {
      // Load Umami analytics script
      // const script = document.createElement('script')
      // script.defer = true
      // script.src = 'https://cloud.umami.is/script.js'
      // script.setAttribute('data-website-id', '6cfb1fe2-e31d-4304-897f-89fd14b546d0')
      // script.setAttribute('data-auto-track', 'false') // Disable auto-track
      // document.head.appendChild(script)
      // Manually track once loaded
      // script.onload = () => {
      //   if (typeof umami !== 'undefined') {
      //     umami.track()
      //   }
      // }
    }
  }

  // Show only if the user hasn’t made a choice
  if (!window.localStorage.getItem('cookiesChoice')) {
    if (typeof dialog.showModal === 'function') {
      dialog.showModal()
    } else {
      // Fallback for browsers that don't support <dialog>
      dialog.classList.add('cookies-banner--fallback')
      dialog.style.display = 'block'

      // Create overlay dynamically
      overlay = document.createElement('div')
      overlay.className = 'cookies-banner__overlay'
      document.body.appendChild(overlay)
    }

    document.body.style.overflow = 'hidden'
  } else {
    insertCookieScripts()
  }

  function closeDialog () {
    window.localStorage.setItem('cookiesChoice', this.dataset.choice)

    insertCookieScripts()

    if (typeof dialog.close === 'function') {
      dialog.close()
    } else {
      dialog.style.display = 'none'
      if (overlay) {
        document.body.removeChild(overlay)
      }
    }
  }

  acceptBtn.dataset.choice = 'accepted'
  denyBtn.dataset.choice = 'denied'

  acceptBtn.addEventListener('click', closeDialog)
  denyBtn.addEventListener('click', closeDialog)
})
