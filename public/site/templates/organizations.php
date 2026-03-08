<?php
namespace ProcessWire;

/**
 * @var Page $page
 * @var Pages $pages
 * @var Config $config
 * 
 */
?>

<head id="head" pw-prepend>
	<meta name="robots" content="all">
</head>

<head id="head" pw-append>
  <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/organizations/organizations.css">
</head>

<main id="content" pw-prepend>
<div class="main__container">
      <h1 class="main__heading1">Organizations</h1>
      <p class="main__text1">Various student organizations exist within the university and its external campuses. As a
        student, you have the opportunity to join any of these groups and participate in their activities.</p>
    </div>
    <div class="main__box">
      <h3 class="main__sub-heading">College-Based Organizations</h3>
      <div class="main__wrapper">
        <?php 
        $college_orgs = $pages->find("template=org-info, org_type='College-Based', limit=5, sort=random");
        foreach ($college_orgs as $college_org): ?>
          <a class="organization" href="<?= $college_org->url ?>">
            <?php $image = $college_org->org_logo ?>
            <img class="org-logo" src=<?= $image->url ?> alt=<?= $image->description ?>>
            <div class="org-link">
              <p><?=$college_org->org_name?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <a class="link link--center" href="/organizations/college-based"><img src="<?= $config->urls->templates ?>assets/icons/arrow-right-with-bg.svg" alt="">Find more college-based organizations</a>
    </div>
    <div class="main__box">
      <h3 class="main__sub-heading">University-Based Organizations</h3>
      <div class="main__wrapper">
          <?php 
        $univ_orgs = $pages->find("template=org-info, org_type='University-Based', limit=5, sort=random");
        foreach ($univ_orgs as $univ_org): ?>
          <a class="organization" href="<?= $univ_org->url ?>">
            <?php $image = $univ_org->org_logo ?>
            <img class="org-logo" src=<?= $image->url ?> alt=<?= $image->description ?>>
            <div class="org-link">
              <p><?=$univ_org->org_name?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <a class="link link--center" href="/organizations/university-based"><img src="<?= $config->urls->templates ?>assets/icons/arrow-right-with-bg.svg" alt="">Find more university-based organizations</a>
    </div>

    <div class="main__box last-box">
      <h3 class="main__sub-heading">Manage your organization</h3>
      <p class="text">Disclaimer: Some documents are provided by the university’s Office of Student Affairs (OSA).</p>

      <div class="document-box">
        <section>
          <h4 class="document-box-heading">Office of Student Affairs</h4>
          <a class="document-link" target="_blank" rel="noreferrer" href="https://wvsu.edu.ph/files/pdf/downloads/osa/wvsu-so-policy-guideline.pdf">
          <svg class="document-link__icon" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.3056 3.75C29.0963 3.75 26.25 15 26.25 15C26.25 15 37.5 11.9062 37.5 19.6069V41.25H7.5V3.75H21.3056ZM22.8544 0H3.75V45H41.25V18.0263C41.25 13.5431 28.785 0 22.8544 0ZM31.875 24.375H26.9475V31.2863H28.6481V28.5262H31.4419V27.1538H28.6481V25.845H31.875V24.375ZM22.6875 24.375H19.6894V31.2863H22.6875C23.6944 31.2863 24.4894 30.9469 25.0538 30.2831C26.0944 29.0494 26.1544 26.4694 24.9375 25.2356C24.3787 24.6731 23.6025 24.375 22.6875 24.375ZM21.39 25.8431H22.32C23.2069 25.8431 23.8237 26.1675 24.0356 27.0506C24.1556 27.5513 24.18 28.3237 23.9963 28.8281C23.7563 29.4862 23.2819 29.8181 22.5825 29.8181H21.3881V25.8431H21.39ZM16.2525 24.375H13.125V31.2863H14.8256V28.8919H16.2525C17.4131 28.8919 18.2475 28.3725 18.5475 27.4613C18.7256 26.9156 18.7256 26.3419 18.5475 25.8019C18.2475 24.8944 17.4113 24.375 16.2525 24.375ZM14.8256 25.7475H15.8494C16.29 25.7475 16.725 25.8 16.9294 26.175C17.055 26.4056 17.055 26.8612 16.9294 27.0919C16.725 27.465 16.29 27.5175 15.8494 27.5175H14.8256V25.7475Z" fill="#21536C"/>
          </svg>
          <span class="document-link__text">View the OSA student policies and guidelines document</span>
          </a>
          <a class="document-link" target="_blank" rel="noreferrer" href="https://wvsu.edu.ph/files/pdf/downloads/osa/WVSU-OSA-SOI-03-F01.pdf">
            <svg class="document-link__icon" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21.3056 3.75C29.0963 3.75 26.25 15 26.25 15C26.25 15 37.5 11.9062 37.5 19.6069V41.25H7.5V3.75H21.3056ZM22.8544 0H3.75V45H41.25V18.0263C41.25 13.5431 28.785 0 22.8544 0ZM31.875 24.375H26.9475V31.2863H28.6481V28.5262H31.4419V27.1538H28.6481V25.845H31.875V24.375ZM22.6875 24.375H19.6894V31.2863H22.6875C23.6944 31.2863 24.4894 30.9469 25.0538 30.2831C26.0944 29.0494 26.1544 26.4694 24.9375 25.2356C24.3787 24.6731 23.6025 24.375 22.6875 24.375ZM21.39 25.8431H22.32C23.2069 25.8431 23.8237 26.1675 24.0356 27.0506C24.1556 27.5513 24.18 28.3237 23.9963 28.8281C23.7563 29.4862 23.2819 29.8181 22.5825 29.8181H21.3881V25.8431H21.39ZM16.2525 24.375H13.125V31.2863H14.8256V28.8919H16.2525C17.4131 28.8919 18.2475 28.3725 18.5475 27.4613C18.7256 26.9156 18.7256 26.3419 18.5475 25.8019C18.2475 24.8944 17.4113 24.375 16.2525 24.375ZM14.8256 25.7475H15.8494C16.29 25.7475 16.725 25.8 16.9294 26.175C17.055 26.4056 17.055 26.8612 16.9294 27.0919C16.725 27.465 16.29 27.5175 15.8494 27.5175H14.8256V25.7475Z" fill="#21536C"/>
            </svg>
            <span class="document-link__text">View the OSA student organization application and renewal form document</span>
          </a>
        </section>
        <section>
          <h4 class="document-box-heading">USC InfoSite</h4>
          <a class="document-link" target="_blank" rel="noreferrer" href="<?= $config->urls->templates ?>assets/docs/Add_Org_Template-20240811.pdf">
            <svg class="document-link__icon" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21.3056 3.75C29.0963 3.75 26.25 15 26.25 15C26.25 15 37.5 11.9062 37.5 19.6069V41.25H7.5V3.75H21.3056ZM22.8544 0H3.75V45H41.25V18.0263C41.25 13.5431 28.785 0 22.8544 0ZM31.875 24.375H26.9475V31.2863H28.6481V28.5262H31.4419V27.1538H28.6481V25.845H31.875V24.375ZM22.6875 24.375H19.6894V31.2863H22.6875C23.6944 31.2863 24.4894 30.9469 25.0538 30.2831C26.0944 29.0494 26.1544 26.4694 24.9375 25.2356C24.3787 24.6731 23.6025 24.375 22.6875 24.375ZM21.39 25.8431H22.32C23.2069 25.8431 23.8237 26.1675 24.0356 27.0506C24.1556 27.5513 24.18 28.3237 23.9963 28.8281C23.7563 29.4862 23.2819 29.8181 22.5825 29.8181H21.3881V25.8431H21.39ZM16.2525 24.375H13.125V31.2863H14.8256V28.8919H16.2525C17.4131 28.8919 18.2475 28.3725 18.5475 27.4613C18.7256 26.9156 18.7256 26.3419 18.5475 25.8019C18.2475 24.8944 17.4113 24.375 16.2525 24.375ZM14.8256 25.7475H15.8494C16.29 25.7475 16.725 25.8 16.9294 26.175C17.055 26.4056 17.055 26.8612 16.9294 27.0919C16.725 27.465 16.29 27.5175 15.8494 27.5175H14.8256V25.7475Z" fill="#21536C"/>
            </svg>  
            <span class="document-link__text">View the “Add your Student Organization InfoSite Content” template</span> 
          </a>
          <a class="document-link" target="_blank" rel="noreferrer" href="<?= $config->urls->templates ?>assets/docs/Update_Org_Template-20240811.pdf">
            <svg class="document-link__icon" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21.3056 3.75C29.0963 3.75 26.25 15 26.25 15C26.25 15 37.5 11.9062 37.5 19.6069V41.25H7.5V3.75H21.3056ZM22.8544 0H3.75V45H41.25V18.0263C41.25 13.5431 28.785 0 22.8544 0ZM31.875 24.375H26.9475V31.2863H28.6481V28.5262H31.4419V27.1538H28.6481V25.845H31.875V24.375ZM22.6875 24.375H19.6894V31.2863H22.6875C23.6944 31.2863 24.4894 30.9469 25.0538 30.2831C26.0944 29.0494 26.1544 26.4694 24.9375 25.2356C24.3787 24.6731 23.6025 24.375 22.6875 24.375ZM21.39 25.8431H22.32C23.2069 25.8431 23.8237 26.1675 24.0356 27.0506C24.1556 27.5513 24.18 28.3237 23.9963 28.8281C23.7563 29.4862 23.2819 29.8181 22.5825 29.8181H21.3881V25.8431H21.39ZM16.2525 24.375H13.125V31.2863H14.8256V28.8919H16.2525C17.4131 28.8919 18.2475 28.3725 18.5475 27.4613C18.7256 26.9156 18.7256 26.3419 18.5475 25.8019C18.2475 24.8944 17.4113 24.375 16.2525 24.375ZM14.8256 25.7475H15.8494C16.29 25.7475 16.725 25.8 16.9294 26.175C17.055 26.4056 17.055 26.8612 16.9294 27.0919C16.725 27.465 16.29 27.5175 15.8494 27.5175H14.8256V25.7475Z" fill="#21536C"/>
            </svg>
            <span class="document-link__text">View the “Update your Student Organization InfoSite Content” template</span>
          </a>
        </section>
      </div>
    </div>
</main>