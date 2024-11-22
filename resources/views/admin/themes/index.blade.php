@extends('admin.layouts.app') @push('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1">
      <li class="breadcrumb-item">
        <a href="{{route('admin.dashboard')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a>Appearance</a>
      </li>
      <li class="breadcrumb-item active">Menus</li>
    </ol>
  </nav>

  <div class="card postion-relative border border-light">
    <!-- Loader Overlay -->
    <div class="loader-overlay d-none">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only"></span>
      </div>
      <b>Loading...</b>
    </div>
    <div class="card-header overflow-hidden">
      <h5>Site/Theme Info</h5>
    </div>
    <div class="card-body p-0">
      <div class="row">
        <div class="col-md-4 col-12 mb-6 mb-md-0">
          <div class="list-group" role="tablist">
            <a
              class="list-group-item list-group-item-action active"
              id="list-general-list"
              data-bs-toggle="list"
              href="#list-general"
              aria-selected="false"
              role="tab"
              tabindex="-1"
              >General</a
            >
            <a
              class="list-group-item list-group-item-action"
              id="list-logo-list"
              data-bs-toggle="list"
              href="#list-logo"
              aria-selected="true"
              role="tab"
              >Logo</a
            >
            <a
              class="list-group-item list-group-item-action"
              id="list-page-list"
              data-bs-toggle="list"
              href="#list-page"
              aria-selected="false"
              role="tab"
              tabindex="-1"
              >Page</a
            >
            <a
              class="list-group-item list-group-item-action"
              id="list-blog-list"
              data-bs-toggle="list"
              href="#list-blog"
              aria-selected="false"
              role="tab"
              tabindex="-1"
              >Blog</a
            >
            <a
              class="list-group-item list-group-item-action"
              id="list-typography-list"
              data-bs-toggle="list"
              href="#list-typography"
              aria-selected="false"
              role="tab"
              tabindex="-1"
              >Typography</a
            >
            <a
              class="list-group-item list-group-item-action"
              id="list-social-links-list"
              data-bs-toggle="list"
              href="#list-social-links"
              aria-selected="false"
              role="tab"
              tabindex="-1"
              >Social Links</a
            >
          </div>
        </div>
        <div class="col-md-8 col-12">
          <div class="tab-content p-0">
            <div
              class="tab-pane fade active show"
              id="list-general"
              role="tabpanel"
              aria-labelledby="list-general-list"
            >
              <div class="mb-4">
                <label for="primary_color" class="mb-3"
                  ><b>Primary Color</b></label
                >
                <div id="colorPicker"></div>
              </div>
              <div class="mb-4">
                <label for="bannerImagePreview" class="mb-3"
                  ><b>Default banner image (1920*170px)</b></label
                >
                <div class="mb-5">
                  <div class="image-preview-wrapper">
                    <img
                      id="bannerImagePreview"
                      class="preview-image"
                      data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                      src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                      alt="Preview image"
                      style="width: 150px"
                      onclick="document.getElementById('formFileBanner').click()"
                    />
                    <button
                      type="button"
                      class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                      data-remove-button
                      data-target-preview="bannerImagePreview"
                      data-target-input="formFileBanner"
                      style="
                        position: absolute;
                        top: 5px;
                        left: 130px;
                        width: 8px;
                        height: 8px;
                      "
                    >
                      &times;
                    </button>
                  </div>
                  <input
                    class="form-control"
                    type="file"
                    id="formFileBanner"
                    name="banner_image"
                    accept="image/jpeg, image/png"
                    data-preview="bannerImagePreview"
                    style="opacity: 0; position: absolute; z-index: -1"
                    onchange="previewSelectedImage(this)"
                  />
                  <br />
                  <b
                    class="text-primary mt-2"
                    onclick="document.getElementById('formFileBanner').click()"
                    type="button"
                  >
                    Choose Image
                  </b>
                </div>
              </div>
              <div class="mb-4">
                <label for="site_description" class="mb-3"
                  ><b>Site Description</b></label
                >
                <textarea
                  name="site_description"
                  id="site_description"
                  rows="4"
                  class="form-control"
                ></textarea>
              </div>
              <div class="mb-4">
                <label for="address" class="mb-3"><b>Address</b></label>
                <input
                  name="address"
                  id="address"
                  class="form-control"
                  placeholder="Address..."
                />
              </div>
              <div class="mb-4">
                <label for="website" class="mb-3"><b>Website</b></label>
                <input
                  name="website"
                  id="website"
                  class="form-control"
                  value="{{route('home')}}"
                />
              </div>
              <div class="mb-4">
                <label for="email" class="mb-3"><b>Email</b></label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="form-control"
                  placeholder="Email..."
                />
              </div>
              <div class="mb-4">
                <label for="site_title" class="mb-3"><b>Site Title</b></label>
                <input
                  type="text"
                  name="site_title"
                  id="site_title"
                  class="form-control"
                  placeholder="Email..."
                />
              </div>
              <div class="mb-4">
                <label for="seo_title" class="mb-3"><b>SEO Title</b></label>
                <input
                  type="text"
                  name="seo_title"
                  id="seo_title"
                  class="form-control"
                  placeholder="Email..."
                />
              </div>
              <div class="mb-4">
                <label for="seo_description" class="mb-3"
                  ><b>SEO Description</b></label
                >
                <textarea
                  name="seo_description"
                  id="seo_description"
                  rows="4"
                  class="form-control"
                ></textarea>
              </div>
              <div class="mb-5">
                <label for="is_index_index" class="mb-3">Index</label>
                <br />
                <label for="indexYes" class="mb-3">
                  <input
                    name="is_index"
                    class="form-check-input"
                    type="radio"
                    value="1"
                    id="indexYes"
                    checked
                  />
                  <span>Index</span>
                </label>
                <label for="indexNo" class="mb-3">
                  <input
                    name="is_index"
                    class="form-check-input"
                    type="radio"
                    value="0"
                    id="indexNo"
                  />
                  <span>No Index</span>
                </label>
              </div>
              <div class="mb-5">
                <label for="seoFormFile" class="mb-3" class="form-label"
                  >SEO Image</label
                >
                <br />
                <div class="image-preview-wrapper">
                  <img
                    id="seoImagePreview"
                    class="preview-image"
                    data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                    src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                    alt="Preview image"
                    style="width: 150px"
                  />
                  <button
                    type="button"
                    class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                    data-remove-button
                    data-target-preview="seoImagePreview"
                    data-target-input="seoFormFile"
                    style="
                      position: absolute;
                      top: 5px;
                      left: 130px;
                      width: 8px;
                      height: 8px;
                    "
                  >
                    &times;
                  </button>
                </div>
                <input
                  class="form-control"
                  type="file"
                  id="seoFormFile"
                  name="seo_image"
                  accept="image/jpeg, image/png"
                  data-preview="seoImagePreview"
                  style="opacity: 0; position: absolute; z-index: -1"
                  onchange="previewSelectedImage(this)"
                />
                <br />
                <b
                  class="text-primary mt-2"
                  onclick="document.getElementById('seoFormFile').click()"
                  type="button"
                >
                  Choose Image
                </b>
              </div>
              <div class="mb-4">
                <label
                  for="copy_right
                                "
                  class="mb-3"
                  ><b>Copy Right</b></label
                >
                <textarea
                  name="copy_right
                                "
                  id="copy_right
                                "
                  rows="4"
                  class="form-control"
                ></textarea>
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="date_format">
                  Date format
                </label>
                <select class="form-select" id="" name="date_format">
                  <option value="M d, Y">M d, Y (Nov 22, 2024)</option>
                  <option value="F j, Y">F j, Y (November 22, 2024)</option>
                  <option value="F d, Y">F d, Y (November 22, 2024)</option>
                  <option value="Y-m-d">Y-m-d (2024-11-22)</option>
                  <option value="Y-M-d">Y-M-d (2024-Nov-22)</option>
                  <option value="d-m-Y">d-m-Y (22-11-2024)</option>
                  <option value="d-M-Y">d-M-Y (22-Nov-2024)</option>
                  <option value="m/d/Y">m/d/Y (11/22/2024)</option>
                  <option value="M/d/Y">M/d/Y (Nov/22/2024)</option>
                  <option value="d/m/Y">d/m/Y (22/11/2024)</option>
                  <option value="d/M/Y">d/M/Y (22/Nov/2024)</option>
                </select>

                <small class="form-hint"
                  >Choose date format for your front theme.</small
                >
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="list-logo"
              role="tabpanel"
              aria-labelledby="list-logo-list"
            >
              <div class="mb-5">
                <label for="faviconFormFile" class="mb-3" class="form-label"
                  >Favicon</label
                >
                <br />
                <div class="image-preview-wrapper">
                  <img
                    id="faviconLogoPreview"
                    class="preview-image"
                    data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                    src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                    alt="Preview image"
                    style="width: 150px"
                  />
                  <button
                    type="button"
                    class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                    data-remove-button
                    data-target-preview="faviconLogoPreview"
                    data-target-input="faviconFormFile"
                    style="
                      position: absolute;
                      top: 5px;
                      left: 130px;
                      width: 8px;
                      height: 8px;
                    "
                  >
                    &times;
                  </button>
                </div>
                <input
                  class="form-control"
                  type="file"
                  id="faviconFormFile"
                  name="seo_image"
                  accept="image/jpeg, image/png"
                  data-preview="faviconLogoPreview"
                  style="opacity: 0; position: absolute; z-index: -1"
                  onchange="previewSelectedImage(this)"
                />
                <br />
                <b
                  class="text-primary mt-2"
                  onclick="document.getElementById('faviconFormFile').click()"
                  type="button"
                >
                  Choose Image
                </b>
              </div>
              <div class="mb-5">
                <label for="logoFormFile" class="mb-3" class="form-label"
                  >Logo</label
                >
                <br />
                <div class="image-preview-wrapper">
                  <img
                    id="logoPreview"
                    class="preview-image"
                    data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                    src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                    alt="Preview image"
                    style="width: 150px"
                  />
                  <button
                    type="button"
                    class="btn rounded-pill btn-icon btn-outline-secondary p-2 mt-2 d-none"
                    data-remove-button
                    data-target-preview="logoPreview"
                    data-target-input="logoFormFile"
                    style="
                      position: absolute;
                      top: 5px;
                      left: 130px;
                      width: 8px;
                      height: 8px;
                    "
                  >
                    &times;
                  </button>
                </div>
                <input
                  class="form-control"
                  type="file"
                  id="logoFormFile"
                  name="seo_image"
                  accept="image/jpeg, image/png"
                  data-preview="logoPreview"
                  style="opacity: 0; position: absolute; z-index: -1"
                  onchange="previewSelectedImage(this)"
                />
                <br />
                <b
                  class="text-primary mt-2"
                  onclick="document.getElementById('logoFormFile').click()"
                  type="button"
                >
                  Choose Image
                </b>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="list-page"
              role="tabpanel"
              aria-labelledby="list-page-list"
            >
              <div class="mb-3 position-relative">
                <label class="form-label" for="homepage_id">
                  Your homepage displays
                </label>
                <select
                  class="form-control form-select"
                  id=""
                  name="homepage_id"
                >
                  <option value="0">Select an option</option>
                  <option value="1" selected="selected">Homepage</option>
                  <option value="2">Blog</option>
                  <option value="3">Contact</option>
                  <option value="4">Cookie Policy</option>
                  <option value="5">Galleries</option>
                </select>
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="galleries_page_id">
                  Galleries page
                </label>
                <select
                  class="form-control form-select"
                  id=""
                  name="galleries_page_id"
                >
                  <option value="" selected="selected">Select an option</option>
                  <option value="1">Homepage</option>
                  <option value="2">Blog</option>
                  <option value="3">Contact</option>
                  <option value="4">Cookie Policy</option>
                  <option value="5">Galleries</option>
                </select>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="list-blog"
              role="tabpanel"
              aria-labelledby="list-blog-list"
            >
              <div class="mb-3 position-relative">
                <label class="form-label" for="blog_page_id"> Blog page </label>
                <select
                  class="form-control form-select"
                  id=""
                  name="blog_page_id"
                >
                  <option value="0">-- Select --</option>
                  <option value="1">Homepage</option>
                  <option value="2" selected="selected">Blog</option>
                  <option value="3">Contact</option>
                  <option value="4">Cookie Policy</option>
                  <option value="5">Galleries</option>
                </select>
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="number_of_posts_in_a_category">
                  Number of posts per page in a category
                </label>
                <input
                  class="form-control"
                  name="number_of_posts_in_a_category"
                  type="number"
                  value="12"
                />
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="number_of_posts_in_a_tag">
                  Number of posts per page in a tag
                </label>
                <input
                  class="form-control"
                  name="number_of_posts_in_a_tag"
                  type="number"
                  value="12"
                />
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="list-typography"
              role="tabpanel"
              aria-labelledby="list-blog-list"
            >
              <div class="mb-3 position-relative">
                <label class="form-label" for="tp_primary_font">
                  Primary font family
                </label>
                <select
                  data-bb-toggle="google-font-selector"
                  class="form-select select2-hidden-accessible"
                  id=""
                  name="tp_primary_font"
                  data-select2-id="select2-data-1-gu65"
                  tabindex="-1"
                  aria-hidden="true"
                >
                  <option value="">-- Select --</option>
                  <option value="ABeeZee">ABeeZee</option>
                  <option value="ADLaM Display">ADLaM Display</option>
                  <option value="AR One Sans">AR One Sans</option>
                  <option value="Abel">Abel</option>
                  <option value="Abhaya Libre">Abhaya Libre</option>
                  <option value="Aboreto">Aboreto</option>
                  <option value="Abril Fatface">Abril Fatface</option>
                  <option value="Abyssinica SIL">Abyssinica SIL</option>
                  <option value="Aclonica">Aclonica</option>
                  <option value="Acme">Acme</option>
                  <option value="Actor">Actor</option>
                  <option value="Adamina">Adamina</option>
                  <option value="Advent Pro">Advent Pro</option>
                  <option value="Afacad">Afacad</option>
                  <option value="Afacad Flux">Afacad Flux</option>
                  <option value="Agbalumo">Agbalumo</option>
                  <option value="Agdasima">Agdasima</option>
                  <option value="Aguafina Script">Aguafina Script</option>
                  <option value="Akatab">Akatab</option>
                  <option value="Akaya Kanadaka">Akaya Kanadaka</option>
                  <option value="Akaya Telivigala">Akaya Telivigala</option>
                  <option value="Akronim">Akronim</option>
                  <option value="Akshar">Akshar</option>
                  <option value="Aladin">Aladin</option>
                  <option value="Alata">Alata</option>
                  <option value="Alatsi">Alatsi</option>
                  <option value="Albert Sans">Albert Sans</option>
                  <option value="Aldrich">Aldrich</option>
                  <option value="Alef">Alef</option>
                  <option value="Alegreya">Alegreya</option>
                  <option value="Alegreya SC">Alegreya SC</option>
                  <option value="Alegreya Sans">Alegreya Sans</option>
                  <option value="Alegreya Sans SC">Alegreya Sans SC</option>
                  <option value="Aleo">Aleo</option>
                  <option value="Alex Brush">Alex Brush</option>
                  <option value="Alexandria">Alexandria</option>
                  <option value="Alfa Slab One">Alfa Slab One</option>
                  <option value="Alice">Alice</option>
                  <option value="Alike">Alike</option>
                  <option value="Alike Angular">Alike Angular</option>
                  <option value="Alkalami">Alkalami</option>
                  <option value="Alkatra">Alkatra</option>
                  <option value="Allan">Allan</option>
                  <option value="Allerta">Allerta</option>
                  <option value="Allerta Stencil">Allerta Stencil</option>
                  <option value="Allison">Allison</option>
                  <option value="Allura">Allura</option>
                  <option value="Almarai">Almarai</option>
                  <option value="Almendra">Almendra</option>
                  <option value="Almendra Display">Almendra Display</option>
                  <option value="Almendra SC">Almendra SC</option>
                  <option value="Alumni Sans">Alumni Sans</option>
                  <option value="Alumni Sans Collegiate One">
                    Alumni Sans Collegiate One
                  </option>
                  <option value="Alumni Sans Inline One">
                    Alumni Sans Inline One
                  </option>
                  <option value="Alumni Sans Pinstripe">
                    Alumni Sans Pinstripe
                  </option>
                  <option value="Amarante">Amarante</option>
                  <option value="Amaranth">Amaranth</option>
                  <option value="Amatic SC">Amatic SC</option>
                  <option value="Amethysta">Amethysta</option>
                  <option value="Amiko">Amiko</option>
                  <option value="Amiri">Amiri</option>
                  <option value="Amiri Quran">Amiri Quran</option>
                  <option value="Amita">Amita</option>
                  <option value="Anaheim">Anaheim</option>
                  <option value="Andada Pro">Andada Pro</option>
                  <option value="Andika">Andika</option>
                  <option value="Anek Bangla">Anek Bangla</option>
                  <option value="Anek Devanagari">Anek Devanagari</option>
                  <option value="Anek Gujarati">Anek Gujarati</option>
                  <option value="Anek Gurmukhi">Anek Gurmukhi</option>
                  <option value="Anek Kannada">Anek Kannada</option>
                  <option value="Anek Latin">Anek Latin</option>
                  <option value="Anek Malayalam">Anek Malayalam</option>
                  <option value="Anek Odia">Anek Odia</option>
                  <option value="Anek Tamil">Anek Tamil</option>
                  <option value="Anek Telugu">Anek Telugu</option>
                  <option value="Angkor">Angkor</option>
                  <option value="Annapurna SIL">Annapurna SIL</option>
                  <option value="Annie Use Your Telescope">
                    Annie Use Your Telescope
                  </option>
                  <option value="Anonymous Pro">Anonymous Pro</option>
                  <option value="Anta">Anta</option>
                  <option value="Antic">Antic</option>
                  <option value="Antic Didone">Antic Didone</option>
                  <option value="Antic Slab">Antic Slab</option>
                  <option value="Anton">Anton</option>
                  <option value="Anton SC">Anton SC</option>
                  <option value="Antonio">Antonio</option>
                  <option value="Anuphan">Anuphan</option>
                  <option value="Anybody">Anybody</option>
                  <option value="Aoboshi One">Aoboshi One</option>
                  <option value="Arapey">Arapey</option>
                  <option value="Arbutus">Arbutus</option>
                  <option value="Arbutus Slab">Arbutus Slab</option>
                  <option value="Architects Daughter">
                    Architects Daughter
                  </option>
                  <option value="Archivo">Archivo</option>
                  <option value="Archivo Black">Archivo Black</option>
                  <option value="Archivo Narrow">Archivo Narrow</option>
                  <option value="Are You Serious">Are You Serious</option>
                  <option value="Aref Ruqaa">Aref Ruqaa</option>
                  <option value="Aref Ruqaa Ink">Aref Ruqaa Ink</option>
                  <option value="Arima">Arima</option>
                  <option value="Arimo">Arimo</option>
                  <option value="Arizonia">Arizonia</option>
                  <option value="Armata">Armata</option>
                  <option value="Arsenal">Arsenal</option>
                  <option value="Arsenal SC">Arsenal SC</option>
                  <option value="Artifika">Artifika</option>
                  <option value="Arvo">Arvo</option>
                  <option value="Arya">Arya</option>
                  <option value="Asap">Asap</option>
                  <option value="Asap Condensed">Asap Condensed</option>
                  <option value="Asar">Asar</option>
                  <option value="Asset">Asset</option>
                  <option value="Assistant">Assistant</option>
                  <option value="Astloch">Astloch</option>
                  <option value="Asul">Asul</option>
                  <option value="Athiti">Athiti</option>
                  <option value="Atkinson Hyperlegible">
                    Atkinson Hyperlegible
                  </option>
                  <option value="Atma">Atma</option>
                  <option value="Atomic Age">Atomic Age</option>
                  <option value="Aubrey">Aubrey</option>
                  <option value="Audiowide">Audiowide</option>
                  <option value="Autour One">Autour One</option>
                  <option value="Average">Average</option>
                  <option value="Average Sans">Average Sans</option>
                  <option value="Averia Gruesa Libre">
                    Averia Gruesa Libre
                  </option>
                  <option value="Averia Libre">Averia Libre</option>
                  <option value="Averia Sans Libre">Averia Sans Libre</option>
                  <option value="Averia Serif Libre">Averia Serif Libre</option>
                  <option value="Azeret Mono">Azeret Mono</option>
                  <option value="B612">B612</option>
                  <option value="B612 Mono">B612 Mono</option>
                  <option value="BIZ UDGothic">BIZ UDGothic</option>
                  <option value="BIZ UDMincho">BIZ UDMincho</option>
                  <option value="BIZ UDPGothic">BIZ UDPGothic</option>
                  <option value="BIZ UDPMincho">BIZ UDPMincho</option>
                  <option value="Babylonica">Babylonica</option>
                  <option value="Bacasime Antique">Bacasime Antique</option>
                  <option value="Bad Script">Bad Script</option>
                  <option value="Bagel Fat One">Bagel Fat One</option>
                  <option value="Bahiana">Bahiana</option>
                  <option value="Bahianita">Bahianita</option>
                  <option value="Bai Jamjuree">Bai Jamjuree</option>
                  <option value="Bakbak One">Bakbak One</option>
                  <option value="Ballet">Ballet</option>
                  <option value="Baloo 2">Baloo 2</option>
                  <option value="Baloo Bhai 2">Baloo Bhai 2</option>
                  <option value="Baloo Bhaijaan 2">Baloo Bhaijaan 2</option>
                  <option value="Baloo Bhaina 2">Baloo Bhaina 2</option>
                  <option value="Baloo Chettan 2">Baloo Chettan 2</option>
                  <option value="Baloo Da 2">Baloo Da 2</option>
                  <option value="Baloo Paaji 2">Baloo Paaji 2</option>
                  <option value="Baloo Tamma 2">Baloo Tamma 2</option>
                  <option value="Baloo Tammudu 2">Baloo Tammudu 2</option>
                  <option value="Baloo Thambi 2">Baloo Thambi 2</option>
                  <option value="Balsamiq Sans">Balsamiq Sans</option>
                  <option value="Balthazar">Balthazar</option>
                  <option value="Bangers">Bangers</option>
                  <option value="Barlow">Barlow</option>
                  <option value="Barlow Condensed">Barlow Condensed</option>
                  <option value="Barlow Semi Condensed">
                    Barlow Semi Condensed
                  </option>
                  <option value="Barriecito">Barriecito</option>
                  <option value="Barrio">Barrio</option>
                  <option value="Basic">Basic</option>
                  <option value="Baskervville">Baskervville</option>
                  <option value="Baskervville SC">Baskervville SC</option>
                  <option value="Battambang">Battambang</option>
                  <option value="Baumans">Baumans</option>
                  <option value="Bayon">Bayon</option>
                  <option value="Be Vietnam Pro">Be Vietnam Pro</option>
                  <option value="Beau Rivage">Beau Rivage</option>
                  <option value="Bebas Neue">Bebas Neue</option>
                  <option value="Beiruti">Beiruti</option>
                  <option value="Belanosima">Belanosima</option>
                  <option value="Belgrano">Belgrano</option>
                  <option value="Bellefair">Bellefair</option>
                  <option value="Belleza">Belleza</option>
                  <option value="Bellota">Bellota</option>
                  <option value="Bellota Text">Bellota Text</option>
                  <option value="BenchNine">BenchNine</option>
                  <option value="Benne">Benne</option>
                  <option value="Bentham">Bentham</option>
                  <option value="Berkshire Swash">Berkshire Swash</option>
                  <option value="Besley">Besley</option>
                  <option value="Beth Ellen">Beth Ellen</option>
                  <option value="Bevan">Bevan</option>
                  <option value="BhuTuka Expanded One">
                    BhuTuka Expanded One
                  </option>
                  <option value="Big Shoulders Display">
                    Big Shoulders Display
                  </option>
                  <option value="Big Shoulders Inline Display">
                    Big Shoulders Inline Display
                  </option>
                  <option value="Big Shoulders Inline Text">
                    Big Shoulders Inline Text
                  </option>
                  <option value="Big Shoulders Stencil Display">
                    Big Shoulders Stencil Display
                  </option>
                  <option value="Big Shoulders Stencil Text">
                    Big Shoulders Stencil Text
                  </option>
                  <option value="Big Shoulders Text">Big Shoulders Text</option>
                  <option value="Bigelow Rules">Bigelow Rules</option>
                  <option value="Bigshot One">Bigshot One</option>
                  <option value="Bilbo">Bilbo</option>
                  <option value="Bilbo Swash Caps">Bilbo Swash Caps</option>
                  <option value="BioRhyme">BioRhyme</option>
                  <option value="BioRhyme Expanded">BioRhyme Expanded</option>
                  <option value="Birthstone">Birthstone</option>
                  <option value="Birthstone Bounce">Birthstone Bounce</option>
                  <option value="Biryani">Biryani</option>
                  <option value="Bitter">Bitter</option>
                  <option value="Black And White Picture">
                    Black And White Picture
                  </option>
                  <option value="Black Han Sans">Black Han Sans</option>
                  <option value="Black Ops One">Black Ops One</option>
                  <option value="Blaka">Blaka</option>
                  <option value="Blaka Hollow">Blaka Hollow</option>
                  <option value="Blaka Ink">Blaka Ink</option>
                  <option value="Blinker">Blinker</option>
                  <option value="Bodoni Moda">Bodoni Moda</option>
                  <option value="Bodoni Moda SC">Bodoni Moda SC</option>
                  <option value="Bokor">Bokor</option>
                  <option value="Bona Nova">Bona Nova</option>
                  <option value="Bona Nova SC">Bona Nova SC</option>
                  <option value="Bonbon">Bonbon</option>
                  <option value="Bonheur Royale">Bonheur Royale</option>
                  <option value="Boogaloo">Boogaloo</option>
                  <option value="Borel">Borel</option>
                  <option value="Bowlby One">Bowlby One</option>
                  <option value="Bowlby One SC">Bowlby One SC</option>
                  <option value="Braah One">Braah One</option>
                  <option value="Brawler">Brawler</option>
                  <option value="Bree Serif">Bree Serif</option>
                  <option value="Bricolage Grotesque">
                    Bricolage Grotesque
                  </option>
                  <option value="Bruno Ace">Bruno Ace</option>
                  <option value="Bruno Ace SC">Bruno Ace SC</option>
                  <option value="Brygada 1918">Brygada 1918</option>
                  <option value="Bubblegum Sans">Bubblegum Sans</option>
                  <option value="Bubbler One">Bubbler One</option>
                  <option value="Buda">Buda</option>
                  <option value="Buenard">Buenard</option>
                  <option value="Bungee">Bungee</option>
                  <option value="Bungee Hairline">Bungee Hairline</option>
                  <option value="Bungee Inline">Bungee Inline</option>
                  <option value="Bungee Outline">Bungee Outline</option>
                  <option value="Bungee Shade">Bungee Shade</option>
                  <option value="Bungee Spice">Bungee Spice</option>
                  <option value="Bungee Tint">Bungee Tint</option>
                  <option value="Butcherman">Butcherman</option>
                  <option value="Butterfly Kids">Butterfly Kids</option>
                  <option value="Cabin">Cabin</option>
                  <option value="Cabin Condensed">Cabin Condensed</option>
                  <option value="Cabin Sketch">Cabin Sketch</option>
                  <option value="Cactus Classical Serif">
                    Cactus Classical Serif
                  </option>
                  <option value="Caesar Dressing">Caesar Dressing</option>
                  <option value="Cagliostro">Cagliostro</option>
                  <option value="Cairo">Cairo</option>
                  <option value="Cairo Play">Cairo Play</option>
                  <option value="Caladea">Caladea</option>
                  <option value="Calistoga">Calistoga</option>
                  <option value="Calligraffitti">Calligraffitti</option>
                  <option value="Cambay">Cambay</option>
                  <option value="Cambo">Cambo</option>
                  <option value="Candal">Candal</option>
                  <option value="Cantarell">Cantarell</option>
                  <option value="Cantata One">Cantata One</option>
                  <option value="Cantora One">Cantora One</option>
                  <option value="Caprasimo">Caprasimo</option>
                  <option value="Capriola">Capriola</option>
                  <option value="Caramel">Caramel</option>
                  <option value="Carattere">Carattere</option>
                  <option value="Cardo">Cardo</option>
                  <option value="Carlito">Carlito</option>
                  <option value="Carme">Carme</option>
                  <option value="Carrois Gothic">Carrois Gothic</option>
                  <option value="Carrois Gothic SC">Carrois Gothic SC</option>
                  <option value="Carter One">Carter One</option>
                  <option value="Castoro">Castoro</option>
                  <option value="Castoro Titling">Castoro Titling</option>
                  <option value="Catamaran">Catamaran</option>
                  <option value="Caudex">Caudex</option>
                  <option value="Caveat">Caveat</option>
                  <option value="Caveat Brush">Caveat Brush</option>
                  <option value="Cedarville Cursive">Cedarville Cursive</option>
                  <option value="Ceviche One">Ceviche One</option>
                  <option value="Chakra Petch">Chakra Petch</option>
                  <option value="Changa">Changa</option>
                  <option value="Changa One">Changa One</option>
                  <option value="Chango">Chango</option>
                  <option value="Charis SIL">Charis SIL</option>
                  <option value="Charm">Charm</option>
                  <option value="Charmonman">Charmonman</option>
                  <option value="Chathura">Chathura</option>
                  <option value="Chau Philomene One">Chau Philomene One</option>
                  <option value="Chela One">Chela One</option>
                  <option value="Chelsea Market">Chelsea Market</option>
                  <option value="Chenla">Chenla</option>
                  <option value="Cherish">Cherish</option>
                  <option value="Cherry Bomb One">Cherry Bomb One</option>
                  <option value="Cherry Cream Soda">Cherry Cream Soda</option>
                  <option value="Cherry Swash">Cherry Swash</option>
                  <option value="Chewy">Chewy</option>
                  <option value="Chicle">Chicle</option>
                  <option value="Chilanka">Chilanka</option>
                  <option value="Chivo">Chivo</option>
                  <option value="Chivo Mono">Chivo Mono</option>
                  <option value="Chocolate Classical Sans">
                    Chocolate Classical Sans
                  </option>
                  <option value="Chokokutai">Chokokutai</option>
                  <option value="Chonburi">Chonburi</option>
                  <option value="Cinzel">Cinzel</option>
                  <option value="Cinzel Decorative">Cinzel Decorative</option>
                  <option value="Clicker Script">Clicker Script</option>
                  <option value="Climate Crisis">Climate Crisis</option>
                  <option value="Coda">Coda</option>
                  <option value="Codystar">Codystar</option>
                  <option value="Coiny">Coiny</option>
                  <option value="Combo">Combo</option>
                  <option value="Comfortaa">Comfortaa</option>
                  <option value="Comforter">Comforter</option>
                  <option value="Comforter Brush">Comforter Brush</option>
                  <option value="Comic Neue">Comic Neue</option>
                  <option value="Coming Soon">Coming Soon</option>
                  <option value="Comme">Comme</option>
                  <option value="Commissioner">Commissioner</option>
                  <option value="Concert One">Concert One</option>
                  <option value="Condiment">Condiment</option>
                  <option value="Content">Content</option>
                  <option value="Contrail One">Contrail One</option>
                  <option value="Convergence">Convergence</option>
                  <option value="Cookie">Cookie</option>
                  <option value="Copse">Copse</option>
                  <option value="Corben">Corben</option>
                  <option value="Corinthia">Corinthia</option>
                  <option value="Cormorant">Cormorant</option>
                  <option value="Cormorant Garamond">Cormorant Garamond</option>
                  <option value="Cormorant Infant">Cormorant Infant</option>
                  <option value="Cormorant SC">Cormorant SC</option>
                  <option value="Cormorant Unicase">Cormorant Unicase</option>
                  <option value="Cormorant Upright">Cormorant Upright</option>
                  <option value="Courgette">Courgette</option>
                  <option value="Courier Prime">Courier Prime</option>
                  <option value="Cousine">Cousine</option>
                  <option value="Coustard">Coustard</option>
                  <option value="Covered By Your Grace">
                    Covered By Your Grace
                  </option>
                  <option value="Crafty Girls">Crafty Girls</option>
                  <option value="Creepster">Creepster</option>
                  <option value="Crete Round">Crete Round</option>
                  <option value="Crimson Pro">Crimson Pro</option>
                  <option value="Crimson Text">Crimson Text</option>
                  <option value="Croissant One">Croissant One</option>
                  <option value="Crushed">Crushed</option>
                  <option value="Cuprum">Cuprum</option>
                  <option value="Cute Font">Cute Font</option>
                  <option value="Cutive">Cutive</option>
                  <option value="Cutive Mono">Cutive Mono</option>
                  <option value="DM Mono">DM Mono</option>
                  <option value="DM Sans">DM Sans</option>
                  <option value="DM Serif Display">DM Serif Display</option>
                  <option value="DM Serif Text">DM Serif Text</option>
                  <option value="Dai Banna SIL">Dai Banna SIL</option>
                  <option value="Damion">Damion</option>
                  <option value="Dancing Script">Dancing Script</option>
                  <option value="Danfo">Danfo</option>
                  <option value="Dangrek">Dangrek</option>
                  <option value="Darker Grotesque">Darker Grotesque</option>
                  <option value="Darumadrop One">Darumadrop One</option>
                  <option value="David Libre">David Libre</option>
                  <option value="Dawning of a New Day">
                    Dawning of a New Day
                  </option>
                  <option value="Days One">Days One</option>
                  <option value="Dekko">Dekko</option>
                  <option value="Dela Gothic One">Dela Gothic One</option>
                  <option value="Delicious Handrawn">Delicious Handrawn</option>
                  <option value="Delius">Delius</option>
                  <option value="Delius Swash Caps">Delius Swash Caps</option>
                  <option value="Delius Unicase">Delius Unicase</option>
                  <option value="Della Respira">Della Respira</option>
                  <option value="Denk One">Denk One</option>
                  <option value="Devonshire">Devonshire</option>
                  <option value="Dhurjati">Dhurjati</option>
                  <option value="Didact Gothic">Didact Gothic</option>
                  <option value="Diphylleia">Diphylleia</option>
                  <option value="Diplomata">Diplomata</option>
                  <option value="Diplomata SC">Diplomata SC</option>
                  <option value="Do Hyeon">Do Hyeon</option>
                  <option value="Dokdo">Dokdo</option>
                  <option value="Domine">Domine</option>
                  <option value="Donegal One">Donegal One</option>
                  <option value="Dongle">Dongle</option>
                  <option value="Doppio One">Doppio One</option>
                  <option value="Dorsa">Dorsa</option>
                  <option value="Dosis">Dosis</option>
                  <option value="DotGothic16">DotGothic16</option>
                  <option value="Doto">Doto</option>
                  <option value="Dr Sugiyama">Dr Sugiyama</option>
                  <option value="Duru Sans">Duru Sans</option>
                  <option value="DynaPuff">DynaPuff</option>
                  <option value="Dynalight">Dynalight</option>
                  <option value="EB Garamond">EB Garamond</option>
                  <option value="Eagle Lake">Eagle Lake</option>
                  <option value="East Sea Dokdo">East Sea Dokdo</option>
                  <option value="Eater">Eater</option>
                  <option value="Economica">Economica</option>
                  <option value="Eczar">Eczar</option>
                  <option value="Edu AU VIC WA NT Dots">
                    Edu AU VIC WA NT Dots
                  </option>
                  <option value="Edu AU VIC WA NT Guides">
                    Edu AU VIC WA NT Guides
                  </option>
                  <option value="Edu AU VIC WA NT Hand">
                    Edu AU VIC WA NT Hand
                  </option>
                  <option value="Edu AU VIC WA NT Pre">
                    Edu AU VIC WA NT Pre
                  </option>
                  <option value="Edu NSW ACT Foundation">
                    Edu NSW ACT Foundation
                  </option>
                  <option value="Edu QLD Beginner">Edu QLD Beginner</option>
                  <option value="Edu SA Beginner">Edu SA Beginner</option>
                  <option value="Edu TAS Beginner">Edu TAS Beginner</option>
                  <option value="Edu VIC WA NT Beginner">
                    Edu VIC WA NT Beginner
                  </option>
                  <option value="El Messiri">El Messiri</option>
                  <option value="Electrolize">Electrolize</option>
                  <option value="Elsie">Elsie</option>
                  <option value="Elsie Swash Caps">Elsie Swash Caps</option>
                  <option value="Emblema One">Emblema One</option>
                  <option value="Emilys Candy">Emilys Candy</option>
                  <option value="Encode Sans">Encode Sans</option>
                  <option value="Encode Sans Condensed">
                    Encode Sans Condensed
                  </option>
                  <option value="Encode Sans Expanded">
                    Encode Sans Expanded
                  </option>
                  <option value="Encode Sans SC">Encode Sans SC</option>
                  <option value="Encode Sans Semi Condensed">
                    Encode Sans Semi Condensed
                  </option>
                  <option value="Encode Sans Semi Expanded">
                    Encode Sans Semi Expanded
                  </option>
                  <option value="Engagement">Engagement</option>
                  <option value="Englebert">Englebert</option>
                  <option value="Enriqueta">Enriqueta</option>
                  <option value="Ephesis">Ephesis</option>
                  <option value="Epilogue">Epilogue</option>
                  <option value="Erica One">Erica One</option>
                  <option value="Esteban">Esteban</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Euphoria Script">Euphoria Script</option>
                  <option value="Ewert">Ewert</option>
                  <option value="Exo">Exo</option>
                  <option value="Exo 2">Exo 2</option>
                  <option value="Expletus Sans">Expletus Sans</option>
                  <option value="Explora">Explora</option>
                  <option value="Faculty Glyphic">Faculty Glyphic</option>
                  <option value="Fahkwang">Fahkwang</option>
                  <option value="Familjen Grotesk">Familjen Grotesk</option>
                  <option value="Fanwood Text">Fanwood Text</option>
                  <option value="Farro">Farro</option>
                  <option value="Farsan">Farsan</option>
                  <option value="Fascinate">Fascinate</option>
                  <option value="Fascinate Inline">Fascinate Inline</option>
                  <option value="Faster One">Faster One</option>
                  <option value="Fasthand">Fasthand</option>
                  <option value="Fauna One">Fauna One</option>
                  <option value="Faustina">Faustina</option>
                  <option value="Federant">Federant</option>
                  <option value="Federo">Federo</option>
                  <option value="Felipa">Felipa</option>
                  <option value="Fenix">Fenix</option>
                  <option value="Festive">Festive</option>
                  <option value="Figtree">Figtree</option>
                  <option value="Finger Paint">Finger Paint</option>
                  <option value="Finlandica">Finlandica</option>
                  <option value="Fira Code">Fira Code</option>
                  <option value="Fira Mono">Fira Mono</option>
                  <option value="Fira Sans">Fira Sans</option>
                  <option value="Fira Sans Condensed">
                    Fira Sans Condensed
                  </option>
                  <option value="Fira Sans Extra Condensed">
                    Fira Sans Extra Condensed
                  </option>
                  <option value="Fjalla One">Fjalla One</option>
                  <option value="Fjord One">Fjord One</option>
                  <option value="Flamenco">Flamenco</option>
                  <option value="Flavors">Flavors</option>
                  <option value="Fleur De Leah">Fleur De Leah</option>
                  <option value="Flow Block">Flow Block</option>
                  <option value="Flow Circular">Flow Circular</option>
                  <option value="Flow Rounded">Flow Rounded</option>
                  <option value="Foldit">Foldit</option>
                  <option value="Fondamento">Fondamento</option>
                  <option value="Fontdiner Swanky">Fontdiner Swanky</option>
                  <option value="Forum">Forum</option>
                  <option value="Fragment Mono">Fragment Mono</option>
                  <option value="Francois One">Francois One</option>
                  <option value="Frank Ruhl Libre">Frank Ruhl Libre</option>
                  <option value="Fraunces">Fraunces</option>
                  <option value="Freckle Face">Freckle Face</option>
                  <option value="Fredericka the Great">
                    Fredericka the Great
                  </option>
                  <option value="Fredoka">Fredoka</option>
                  <option value="Freehand">Freehand</option>
                  <option value="Freeman">Freeman</option>
                  <option value="Fresca">Fresca</option>
                  <option value="Frijole">Frijole</option>
                  <option value="Fruktur">Fruktur</option>
                  <option value="Fugaz One">Fugaz One</option>
                  <option value="Fuggles">Fuggles</option>
                  <option value="Funnel Display">Funnel Display</option>
                  <option value="Funnel Sans">Funnel Sans</option>
                  <option value="Fustat">Fustat</option>
                  <option value="Fuzzy Bubbles">Fuzzy Bubbles</option>
                  <option value="GFS Didot">GFS Didot</option>
                  <option value="GFS Neohellenic">GFS Neohellenic</option>
                  <option value="Ga Maamli">Ga Maamli</option>
                  <option value="Gabarito">Gabarito</option>
                  <option value="Gabriela">Gabriela</option>
                  <option value="Gaegu">Gaegu</option>
                  <option value="Gafata">Gafata</option>
                  <option value="Gajraj One">Gajraj One</option>
                  <option value="Galada">Galada</option>
                  <option value="Galdeano">Galdeano</option>
                  <option value="Galindo">Galindo</option>
                  <option value="Gamja Flower">Gamja Flower</option>
                  <option value="Gantari">Gantari</option>
                  <option value="Gasoek One">Gasoek One</option>
                  <option value="Gayathri">Gayathri</option>
                  <option value="Geist">Geist</option>
                  <option value="Geist Mono">Geist Mono</option>
                  <option value="Gelasio">Gelasio</option>
                  <option value="Gemunu Libre">Gemunu Libre</option>
                  <option value="Genos">Genos</option>
                  <option value="Gentium Book Plus">Gentium Book Plus</option>
                  <option value="Gentium Plus">Gentium Plus</option>
                  <option value="Geo">Geo</option>
                  <option value="Geologica">Geologica</option>
                  <option value="Georama">Georama</option>
                  <option value="Geostar">Geostar</option>
                  <option value="Geostar Fill">Geostar Fill</option>
                  <option value="Germania One">Germania One</option>
                  <option value="Gideon Roman">Gideon Roman</option>
                  <option value="Gidugu">Gidugu</option>
                  <option value="Gilda Display">Gilda Display</option>
                  <option value="Girassol">Girassol</option>
                  <option value="Give You Glory">Give You Glory</option>
                  <option value="Glass Antiqua">Glass Antiqua</option>
                  <option value="Glegoo">Glegoo</option>
                  <option value="Gloock">Gloock</option>
                  <option value="Gloria Hallelujah">Gloria Hallelujah</option>
                  <option value="Glory">Glory</option>
                  <option value="Gluten">Gluten</option>
                  <option value="Goblin One">Goblin One</option>
                  <option value="Gochi Hand">Gochi Hand</option>
                  <option value="Goldman">Goldman</option>
                  <option value="Golos Text">Golos Text</option>
                  <option value="Gorditas">Gorditas</option>
                  <option value="Gothic A1">Gothic A1</option>
                  <option value="Gotu">Gotu</option>
                  <option value="Goudy Bookletter 1911">
                    Goudy Bookletter 1911
                  </option>
                  <option value="Gowun Batang">Gowun Batang</option>
                  <option value="Gowun Dodum">Gowun Dodum</option>
                  <option value="Graduate">Graduate</option>
                  <option value="Grand Hotel">Grand Hotel</option>
                  <option value="Grandiflora One">Grandiflora One</option>
                  <option value="Grandstander">Grandstander</option>
                  <option value="Grape Nuts">Grape Nuts</option>
                  <option value="Gravitas One">Gravitas One</option>
                  <option value="Great Vibes">Great Vibes</option>
                  <option value="Grechen Fuemen">Grechen Fuemen</option>
                  <option value="Grenze">Grenze</option>
                  <option value="Grenze Gotisch">Grenze Gotisch</option>
                  <option value="Grey Qo">Grey Qo</option>
                  <option value="Griffy">Griffy</option>
                  <option value="Gruppo">Gruppo</option>
                  <option value="Gudea">Gudea</option>
                  <option value="Gugi">Gugi</option>
                  <option value="Gulzar">Gulzar</option>
                  <option value="Gupter">Gupter</option>
                  <option value="Gurajada">Gurajada</option>
                  <option value="Gwendolyn">Gwendolyn</option>
                  <option value="Habibi">Habibi</option>
                  <option value="Hachi Maru Pop">Hachi Maru Pop</option>
                  <option value="Hahmlet">Hahmlet</option>
                  <option value="Halant">Halant</option>
                  <option value="Hammersmith One">Hammersmith One</option>
                  <option value="Hanalei">Hanalei</option>
                  <option value="Hanalei Fill">Hanalei Fill</option>
                  <option value="Handjet">Handjet</option>
                  <option value="Handlee">Handlee</option>
                  <option value="Hanken Grotesk">Hanken Grotesk</option>
                  <option value="Hanuman">Hanuman</option>
                  <option value="Happy Monkey">Happy Monkey</option>
                  <option value="Harmattan">Harmattan</option>
                  <option value="Headland One">Headland One</option>
                  <option value="Hedvig Letters Sans">
                    Hedvig Letters Sans
                  </option>
                  <option value="Hedvig Letters Serif">
                    Hedvig Letters Serif
                  </option>
                  <option value="Heebo">Heebo</option>
                  <option value="Henny Penny">Henny Penny</option>
                  <option value="Hepta Slab">Hepta Slab</option>
                  <option value="Herr Von Muellerhoff">
                    Herr Von Muellerhoff
                  </option>
                  <option value="Hi Melody">Hi Melody</option>
                  <option value="Hina Mincho">Hina Mincho</option>
                  <option value="Hind">Hind</option>
                  <option value="Hind Guntur">Hind Guntur</option>
                  <option value="Hind Madurai">Hind Madurai</option>
                  <option value="Hind Siliguri">Hind Siliguri</option>
                  <option value="Hind Vadodara">Hind Vadodara</option>
                  <option value="Holtwood One SC">Holtwood One SC</option>
                  <option value="Homemade Apple">Homemade Apple</option>
                  <option value="Homenaje">Homenaje</option>
                  <option value="Honk">Honk</option>
                  <option value="Host Grotesk">Host Grotesk</option>
                  <option value="Hubballi">Hubballi</option>
                  <option value="Hubot Sans">Hubot Sans</option>
                  <option value="Hurricane">Hurricane</option>
                  <option value="IBM Plex Mono">IBM Plex Mono</option>
                  <option value="IBM Plex Sans">IBM Plex Sans</option>
                  <option value="IBM Plex Sans Arabic">
                    IBM Plex Sans Arabic
                  </option>
                  <option value="IBM Plex Sans Condensed">
                    IBM Plex Sans Condensed
                  </option>
                  <option value="IBM Plex Sans Devanagari">
                    IBM Plex Sans Devanagari
                  </option>
                  <option value="IBM Plex Sans Hebrew">
                    IBM Plex Sans Hebrew
                  </option>
                  <option value="IBM Plex Sans JP">IBM Plex Sans JP</option>
                  <option value="IBM Plex Sans KR">IBM Plex Sans KR</option>
                  <option value="IBM Plex Sans Thai">IBM Plex Sans Thai</option>
                  <option value="IBM Plex Sans Thai Looped">
                    IBM Plex Sans Thai Looped
                  </option>
                  <option value="IBM Plex Serif">IBM Plex Serif</option>
                  <option value="IM Fell DW Pica">IM Fell DW Pica</option>
                  <option value="IM Fell DW Pica SC">IM Fell DW Pica SC</option>
                  <option value="IM Fell Double Pica">
                    IM Fell Double Pica
                  </option>
                  <option value="IM Fell Double Pica SC">
                    IM Fell Double Pica SC
                  </option>
                  <option value="IM Fell English">IM Fell English</option>
                  <option value="IM Fell English SC">IM Fell English SC</option>
                  <option value="IM Fell French Canon">
                    IM Fell French Canon
                  </option>
                  <option value="IM Fell French Canon SC">
                    IM Fell French Canon SC
                  </option>
                  <option value="IM Fell Great Primer">
                    IM Fell Great Primer
                  </option>
                  <option value="IM Fell Great Primer SC">
                    IM Fell Great Primer SC
                  </option>
                  <option value="Ibarra Real Nova">Ibarra Real Nova</option>
                  <option value="Iceberg">Iceberg</option>
                  <option value="Iceland">Iceland</option>
                  <option value="Imbue">Imbue</option>
                  <option value="Imperial Script">Imperial Script</option>
                  <option value="Imprima">Imprima</option>
                  <option value="Inclusive Sans">Inclusive Sans</option>
                  <option value="Inconsolata">Inconsolata</option>
                  <option value="Inder">Inder</option>
                  <option value="Indie Flower">Indie Flower</option>
                  <option value="Ingrid Darling">Ingrid Darling</option>
                  <option value="Inika">Inika</option>
                  <option value="Inknut Antiqua">Inknut Antiqua</option>
                  <option value="Inria Sans">Inria Sans</option>
                  <option value="Inria Serif">Inria Serif</option>
                  <option value="Inspiration">Inspiration</option>
                  <option value="Instrument Sans">Instrument Sans</option>
                  <option value="Instrument Serif">Instrument Serif</option>
                  <option value="Inter">Inter</option>
                  <option value="Inter Tight">Inter Tight</option>
                  <option value="Irish Grover">Irish Grover</option>
                  <option value="Island Moments">Island Moments</option>
                  <option value="Istok Web">Istok Web</option>
                  <option value="Italiana">Italiana</option>
                  <option value="Italianno">Italianno</option>
                  <option value="Itim">Itim</option>
                  <option value="Jacquard 12">Jacquard 12</option>
                  <option value="Jacquard 12 Charted">
                    Jacquard 12 Charted
                  </option>
                  <option value="Jacquard 24">Jacquard 24</option>
                  <option value="Jacquard 24 Charted">
                    Jacquard 24 Charted
                  </option>
                  <option value="Jacquarda Bastarda 9">
                    Jacquarda Bastarda 9
                  </option>
                  <option value="Jacquarda Bastarda 9 Charted">
                    Jacquarda Bastarda 9 Charted
                  </option>
                  <option value="Jacques Francois">Jacques Francois</option>
                  <option value="Jacques Francois Shadow">
                    Jacques Francois Shadow
                  </option>
                  <option value="Jaini">Jaini</option>
                  <option value="Jaini Purva">Jaini Purva</option>
                  <option value="Jaldi">Jaldi</option>
                  <option value="Jaro">Jaro</option>
                  <option value="Jersey 10">Jersey 10</option>
                  <option value="Jersey 10 Charted">Jersey 10 Charted</option>
                  <option value="Jersey 15">Jersey 15</option>
                  <option value="Jersey 15 Charted">Jersey 15 Charted</option>
                  <option value="Jersey 20">Jersey 20</option>
                  <option value="Jersey 20 Charted">Jersey 20 Charted</option>
                  <option value="Jersey 25">Jersey 25</option>
                  <option value="Jersey 25 Charted">Jersey 25 Charted</option>
                  <option value="JetBrains Mono">JetBrains Mono</option>
                  <option value="Jim Nightshade">Jim Nightshade</option>
                  <option value="Joan">Joan</option>
                  <option value="Jockey One">Jockey One</option>
                  <option value="Jolly Lodger">Jolly Lodger</option>
                  <option value="Jomhuria">Jomhuria</option>
                  <option value="Jomolhari">Jomolhari</option>
                  <option value="Josefin Sans">Josefin Sans</option>
                  <option value="Josefin Slab">Josefin Slab</option>
                  <option value="Jost">Jost</option>
                  <option value="Joti One">Joti One</option>
                  <option value="Jua">Jua</option>
                  <option value="Judson">Judson</option>
                  <option value="Julee">Julee</option>
                  <option value="Julius Sans One">Julius Sans One</option>
                  <option value="Junge">Junge</option>
                  <option value="Jura">Jura</option>
                  <option value="Just Another Hand">Just Another Hand</option>
                  <option value="Just Me Again Down Here">
                    Just Me Again Down Here
                  </option>
                  <option value="K2D">K2D</option>
                  <option value="Kablammo">Kablammo</option>
                  <option value="Kadwa">Kadwa</option>
                  <option value="Kaisei Decol">Kaisei Decol</option>
                  <option value="Kaisei HarunoUmi">Kaisei HarunoUmi</option>
                  <option value="Kaisei Opti">Kaisei Opti</option>
                  <option value="Kaisei Tokumin">Kaisei Tokumin</option>
                  <option value="Kalam">Kalam</option>
                  <option value="Kalnia">Kalnia</option>
                  <option value="Kalnia Glaze">Kalnia Glaze</option>
                  <option value="Kameron">Kameron</option>
                  <option value="Kanit">Kanit</option>
                  <option value="Kantumruy Pro">Kantumruy Pro</option>
                  <option value="Karantina">Karantina</option>
                  <option value="Karla">Karla</option>
                  <option value="Karla Tamil Inclined">
                    Karla Tamil Inclined
                  </option>
                  <option value="Karla Tamil Upright">
                    Karla Tamil Upright
                  </option>
                  <option value="Karma">Karma</option>
                  <option value="Katibeh">Katibeh</option>
                  <option value="Kaushan Script">Kaushan Script</option>
                  <option value="Kavivanar">Kavivanar</option>
                  <option value="Kavoon">Kavoon</option>
                  <option value="Kay Pho Du">Kay Pho Du</option>
                  <option value="Kdam Thmor Pro">Kdam Thmor Pro</option>
                  <option value="Keania One">Keania One</option>
                  <option value="Kelly Slab">Kelly Slab</option>
                  <option value="Kenia">Kenia</option>
                  <option value="Khand">Khand</option>
                  <option value="Khmer">Khmer</option>
                  <option value="Khula">Khula</option>
                  <option value="Kings">Kings</option>
                  <option value="Kirang Haerang">Kirang Haerang</option>
                  <option value="Kite One">Kite One</option>
                  <option value="Kiwi Maru">Kiwi Maru</option>
                  <option value="Klee One">Klee One</option>
                  <option value="Knewave">Knewave</option>
                  <option value="KoHo">KoHo</option>
                  <option value="Kodchasan">Kodchasan</option>
                  <option value="Kode Mono">Kode Mono</option>
                  <option value="Koh Santepheap">Koh Santepheap</option>
                  <option value="Kolker Brush">Kolker Brush</option>
                  <option value="Konkhmer Sleokchher">
                    Konkhmer Sleokchher
                  </option>
                  <option value="Kosugi">Kosugi</option>
                  <option value="Kosugi Maru">Kosugi Maru</option>
                  <option value="Kotta One">Kotta One</option>
                  <option value="Koulen">Koulen</option>
                  <option value="Kranky">Kranky</option>
                  <option value="Kreon">Kreon</option>
                  <option value="Kristi">Kristi</option>
                  <option value="Krona One">Krona One</option>
                  <option value="Krub">Krub</option>
                  <option value="Kufam">Kufam</option>
                  <option value="Kulim Park">Kulim Park</option>
                  <option value="Kumar One">Kumar One</option>
                  <option value="Kumar One Outline">Kumar One Outline</option>
                  <option value="Kumbh Sans">Kumbh Sans</option>
                  <option value="Kurale">Kurale</option>
                  <option value="LXGW WenKai Mono TC">
                    LXGW WenKai Mono TC
                  </option>
                  <option value="LXGW WenKai TC">LXGW WenKai TC</option>
                  <option value="La Belle Aurore">La Belle Aurore</option>
                  <option value="Labrada">Labrada</option>
                  <option value="Lacquer">Lacquer</option>
                  <option value="Laila">Laila</option>
                  <option value="Lakki Reddy">Lakki Reddy</option>
                  <option value="Lalezar">Lalezar</option>
                  <option value="Lancelot">Lancelot</option>
                  <option value="Langar">Langar</option>
                  <option value="Lateef">Lateef</option>
                  <option value="Lato">Lato</option>
                  <option value="Lavishly Yours">Lavishly Yours</option>
                  <option value="League Gothic">League Gothic</option>
                  <option value="League Script">League Script</option>
                  <option value="League Spartan">League Spartan</option>
                  <option value="Leckerli One">Leckerli One</option>
                  <option value="Ledger">Ledger</option>
                  <option value="Lekton">Lekton</option>
                  <option value="Lemon">Lemon</option>
                  <option value="Lemonada">Lemonada</option>
                  <option value="Lexend">Lexend</option>
                  <option value="Lexend Deca">Lexend Deca</option>
                  <option value="Lexend Exa">Lexend Exa</option>
                  <option value="Lexend Giga">Lexend Giga</option>
                  <option value="Lexend Mega">Lexend Mega</option>
                  <option value="Lexend Peta">Lexend Peta</option>
                  <option value="Lexend Tera">Lexend Tera</option>
                  <option value="Lexend Zetta">Lexend Zetta</option>
                  <option value="Libre Barcode 128">Libre Barcode 128</option>
                  <option value="Libre Barcode 128 Text">
                    Libre Barcode 128 Text
                  </option>
                  <option value="Libre Barcode 39">Libre Barcode 39</option>
                  <option value="Libre Barcode 39 Extended">
                    Libre Barcode 39 Extended
                  </option>
                  <option value="Libre Barcode 39 Extended Text">
                    Libre Barcode 39 Extended Text
                  </option>
                  <option value="Libre Barcode 39 Text">
                    Libre Barcode 39 Text
                  </option>
                  <option value="Libre Barcode EAN13 Text">
                    Libre Barcode EAN13 Text
                  </option>
                  <option value="Libre Baskerville">Libre Baskerville</option>
                  <option value="Libre Bodoni">Libre Bodoni</option>
                  <option value="Libre Caslon Display">
                    Libre Caslon Display
                  </option>
                  <option value="Libre Caslon Text">Libre Caslon Text</option>
                  <option value="Libre Franklin">Libre Franklin</option>
                  <option value="Licorice">Licorice</option>
                  <option value="Life Savers">Life Savers</option>
                  <option value="Lilita One">Lilita One</option>
                  <option value="Lily Script One">Lily Script One</option>
                  <option value="Limelight">Limelight</option>
                  <option value="Linden Hill">Linden Hill</option>
                  <option value="Linefont">Linefont</option>
                  <option value="Lisu Bosa">Lisu Bosa</option>
                  <option value="Literata">Literata</option>
                  <option value="Liu Jian Mao Cao">Liu Jian Mao Cao</option>
                  <option value="Livvic">Livvic</option>
                  <option value="Lobster">Lobster</option>
                  <option value="Lobster Two">Lobster Two</option>
                  <option value="Londrina Outline">Londrina Outline</option>
                  <option value="Londrina Shadow">Londrina Shadow</option>
                  <option value="Londrina Sketch">Londrina Sketch</option>
                  <option value="Londrina Solid">Londrina Solid</option>
                  <option value="Long Cang">Long Cang</option>
                  <option value="Lora">Lora</option>
                  <option value="Love Light">Love Light</option>
                  <option value="Love Ya Like A Sister">
                    Love Ya Like A Sister
                  </option>
                  <option value="Loved by the King">Loved by the King</option>
                  <option value="Lovers Quarrel">Lovers Quarrel</option>
                  <option value="Luckiest Guy">Luckiest Guy</option>
                  <option value="Lugrasimo">Lugrasimo</option>
                  <option value="Lumanosimo">Lumanosimo</option>
                  <option value="Lunasima">Lunasima</option>
                  <option value="Lusitana">Lusitana</option>
                  <option value="Lustria">Lustria</option>
                  <option value="Luxurious Roman">Luxurious Roman</option>
                  <option value="Luxurious Script">Luxurious Script</option>
                  <option value="M PLUS 1">M PLUS 1</option>
                  <option value="M PLUS 1 Code">M PLUS 1 Code</option>
                  <option value="M PLUS 1p">M PLUS 1p</option>
                  <option value="M PLUS 2">M PLUS 2</option>
                  <option value="M PLUS Code Latin">M PLUS Code Latin</option>
                  <option value="M PLUS Rounded 1c">M PLUS Rounded 1c</option>
                  <option value="Ma Shan Zheng">Ma Shan Zheng</option>
                  <option value="Macondo">Macondo</option>
                  <option value="Macondo Swash Caps">Macondo Swash Caps</option>
                  <option value="Mada">Mada</option>
                  <option value="Madimi One">Madimi One</option>
                  <option value="Magra">Magra</option>
                  <option value="Maiden Orange">Maiden Orange</option>
                  <option value="Maitree">Maitree</option>
                  <option value="Major Mono Display">Major Mono Display</option>
                  <option value="Mako">Mako</option>
                  <option value="Mali">Mali</option>
                  <option value="Mallanna">Mallanna</option>
                  <option value="Maname">Maname</option>
                  <option value="Mandali">Mandali</option>
                  <option value="Manjari">Manjari</option>
                  <option value="Manrope">Manrope</option>
                  <option value="Mansalva">Mansalva</option>
                  <option value="Manuale">Manuale</option>
                  <option value="Marcellus">Marcellus</option>
                  <option value="Marcellus SC">Marcellus SC</option>
                  <option value="Marck Script">Marck Script</option>
                  <option value="Margarine">Margarine</option>
                  <option value="Marhey">Marhey</option>
                  <option value="Markazi Text">Markazi Text</option>
                  <option value="Marko One">Marko One</option>
                  <option value="Marmelad">Marmelad</option>
                  <option value="Martel">Martel</option>
                  <option value="Martel Sans">Martel Sans</option>
                  <option value="Martian Mono">Martian Mono</option>
                  <option value="Marvel">Marvel</option>
                  <option value="Mate">Mate</option>
                  <option value="Mate SC">Mate SC</option>
                  <option value="Matemasie">Matemasie</option>
                  <option value="Material Icons">Material Icons</option>
                  <option value="Material Icons Outlined">
                    Material Icons Outlined
                  </option>
                  <option value="Material Icons Round">
                    Material Icons Round
                  </option>
                  <option value="Material Icons Sharp">
                    Material Icons Sharp
                  </option>
                  <option value="Material Icons Two Tone">
                    Material Icons Two Tone
                  </option>
                  <option value="Material Symbols Outlined">
                    Material Symbols Outlined
                  </option>
                  <option value="Material Symbols Rounded">
                    Material Symbols Rounded
                  </option>
                  <option value="Material Symbols Sharp">
                    Material Symbols Sharp
                  </option>
                  <option value="Maven Pro">Maven Pro</option>
                  <option value="McLaren">McLaren</option>
                  <option value="Mea Culpa">Mea Culpa</option>
                  <option value="Meddon">Meddon</option>
                  <option value="MedievalSharp">MedievalSharp</option>
                  <option value="Medula One">Medula One</option>
                  <option value="Meera Inimai">Meera Inimai</option>
                  <option value="Megrim">Megrim</option>
                  <option value="Meie Script">Meie Script</option>
                  <option value="Meow Script">Meow Script</option>
                  <option value="Merienda">Merienda</option>
                  <option value="Merriweather">Merriweather</option>
                  <option value="Merriweather Sans">Merriweather Sans</option>
                  <option value="Metal">Metal</option>
                  <option value="Metal Mania">Metal Mania</option>
                  <option value="Metamorphous">Metamorphous</option>
                  <option value="Metrophobic">Metrophobic</option>
                  <option value="Michroma">Michroma</option>
                  <option value="Micro 5">Micro 5</option>
                  <option value="Micro 5 Charted">Micro 5 Charted</option>
                  <option value="Milonga">Milonga</option>
                  <option value="Miltonian">Miltonian</option>
                  <option value="Miltonian Tattoo">Miltonian Tattoo</option>
                  <option value="Mina">Mina</option>
                  <option value="Mingzat">Mingzat</option>
                  <option value="Miniver">Miniver</option>
                  <option value="Miriam Libre">Miriam Libre</option>
                  <option value="Mirza">Mirza</option>
                  <option value="Miss Fajardose">Miss Fajardose</option>
                  <option value="Mitr">Mitr</option>
                  <option value="Mochiy Pop One">Mochiy Pop One</option>
                  <option value="Mochiy Pop P One">Mochiy Pop P One</option>
                  <option value="Modak">Modak</option>
                  <option value="Modern Antiqua">Modern Antiqua</option>
                  <option value="Moderustic">Moderustic</option>
                  <option value="Mogra">Mogra</option>
                  <option value="Mohave">Mohave</option>
                  <option value="Moirai One">Moirai One</option>
                  <option value="Molengo">Molengo</option>
                  <option value="Molle">Molle</option>
                  <option value="Mona Sans">Mona Sans</option>
                  <option value="Monda">Monda</option>
                  <option value="Monofett">Monofett</option>
                  <option value="Monomaniac One">Monomaniac One</option>
                  <option value="Monoton">Monoton</option>
                  <option value="Monsieur La Doulaise">
                    Monsieur La Doulaise
                  </option>
                  <option value="Montaga">Montaga</option>
                  <option value="Montagu Slab">Montagu Slab</option>
                  <option value="MonteCarlo">MonteCarlo</option>
                  <option value="Montez">Montez</option>
                  <option value="Montserrat">Montserrat</option>
                  <option value="Montserrat Alternates">
                    Montserrat Alternates
                  </option>
                  <option value="Montserrat Subrayada">
                    Montserrat Subrayada
                  </option>
                  <option value="Moo Lah Lah">Moo Lah Lah</option>
                  <option value="Mooli">Mooli</option>
                  <option value="Moon Dance">Moon Dance</option>
                  <option value="Moul">Moul</option>
                  <option value="Moulpali">Moulpali</option>
                  <option value="Mountains of Christmas">
                    Mountains of Christmas
                  </option>
                  <option value="Mouse Memoirs">Mouse Memoirs</option>
                  <option value="Mr Bedfort">Mr Bedfort</option>
                  <option value="Mr Dafoe">Mr Dafoe</option>
                  <option value="Mr De Haviland">Mr De Haviland</option>
                  <option value="Mrs Saint Delafield">
                    Mrs Saint Delafield
                  </option>
                  <option value="Mrs Sheppards">Mrs Sheppards</option>
                  <option value="Ms Madi">Ms Madi</option>
                  <option value="Mukta">Mukta</option>
                  <option value="Mukta Mahee">Mukta Mahee</option>
                  <option value="Mukta Malar">Mukta Malar</option>
                  <option value="Mukta Vaani">Mukta Vaani</option>
                  <option value="Mulish">Mulish</option>
                  <option value="Murecho">Murecho</option>
                  <option value="MuseoModerno">MuseoModerno</option>
                  <option value="My Soul">My Soul</option>
                  <option value="Mynerve">Mynerve</option>
                  <option value="Mystery Quest">Mystery Quest</option>
                  <option value="NTR">NTR</option>
                  <option value="Nabla">Nabla</option>
                  <option value="Namdhinggo">Namdhinggo</option>
                  <option value="Nanum Brush Script">Nanum Brush Script</option>
                  <option value="Nanum Gothic">Nanum Gothic</option>
                  <option value="Nanum Gothic Coding">
                    Nanum Gothic Coding
                  </option>
                  <option value="Nanum Myeongjo">Nanum Myeongjo</option>
                  <option value="Nanum Pen Script">Nanum Pen Script</option>
                  <option value="Narnoor">Narnoor</option>
                  <option value="Neonderthaw">Neonderthaw</option>
                  <option value="Nerko One">Nerko One</option>
                  <option value="Neucha">Neucha</option>
                  <option value="Neuton">Neuton</option>
                  <option value="New Amsterdam">New Amsterdam</option>
                  <option value="New Rocker">New Rocker</option>
                  <option value="New Tegomin">New Tegomin</option>
                  <option value="News Cycle">News Cycle</option>
                  <option value="Newsreader">Newsreader</option>
                  <option value="Niconne">Niconne</option>
                  <option value="Niramit">Niramit</option>
                  <option value="Nixie One">Nixie One</option>
                  <option value="Nobile">Nobile</option>
                  <option value="Nokora">Nokora</option>
                  <option value="Norican">Norican</option>
                  <option value="Nosifer">Nosifer</option>
                  <option value="Notable">Notable</option>
                  <option value="Nothing You Could Do">
                    Nothing You Could Do
                  </option>
                  <option value="Noticia Text">Noticia Text</option>
                  <option value="Noto Color Emoji">Noto Color Emoji</option>
                  <option value="Noto Emoji">Noto Emoji</option>
                  <option value="Noto Kufi Arabic">Noto Kufi Arabic</option>
                  <option value="Noto Music">Noto Music</option>
                  <option value="Noto Naskh Arabic">Noto Naskh Arabic</option>
                  <option value="Noto Nastaliq Urdu">Noto Nastaliq Urdu</option>
                  <option value="Noto Rashi Hebrew">Noto Rashi Hebrew</option>
                  <option value="Noto Sans">Noto Sans</option>
                  <option value="Noto Sans Adlam">Noto Sans Adlam</option>
                  <option value="Noto Sans Adlam Unjoined">
                    Noto Sans Adlam Unjoined
                  </option>
                  <option value="Noto Sans Anatolian Hieroglyphs">
                    Noto Sans Anatolian Hieroglyphs
                  </option>
                  <option value="Noto Sans Arabic">Noto Sans Arabic</option>
                  <option value="Noto Sans Armenian">Noto Sans Armenian</option>
                  <option value="Noto Sans Avestan">Noto Sans Avestan</option>
                  <option value="Noto Sans Balinese">Noto Sans Balinese</option>
                  <option value="Noto Sans Bamum">Noto Sans Bamum</option>
                  <option value="Noto Sans Bassa Vah">
                    Noto Sans Bassa Vah
                  </option>
                  <option value="Noto Sans Batak">Noto Sans Batak</option>
                  <option value="Noto Sans Bengali">Noto Sans Bengali</option>
                  <option value="Noto Sans Bhaiksuki">
                    Noto Sans Bhaiksuki
                  </option>
                  <option value="Noto Sans Brahmi">Noto Sans Brahmi</option>
                  <option value="Noto Sans Buginese">Noto Sans Buginese</option>
                  <option value="Noto Sans Buhid">Noto Sans Buhid</option>
                  <option value="Noto Sans Canadian Aboriginal">
                    Noto Sans Canadian Aboriginal
                  </option>
                  <option value="Noto Sans Carian">Noto Sans Carian</option>
                  <option value="Noto Sans Caucasian Albanian">
                    Noto Sans Caucasian Albanian
                  </option>
                  <option value="Noto Sans Chakma">Noto Sans Chakma</option>
                  <option value="Noto Sans Cham">Noto Sans Cham</option>
                  <option value="Noto Sans Cherokee">Noto Sans Cherokee</option>
                  <option value="Noto Sans Chorasmian">
                    Noto Sans Chorasmian
                  </option>
                  <option value="Noto Sans Coptic">Noto Sans Coptic</option>
                  <option value="Noto Sans Cuneiform">
                    Noto Sans Cuneiform
                  </option>
                  <option value="Noto Sans Cypriot">Noto Sans Cypriot</option>
                  <option value="Noto Sans Cypro Minoan">
                    Noto Sans Cypro Minoan
                  </option>
                  <option value="Noto Sans Deseret">Noto Sans Deseret</option>
                  <option value="Noto Sans Devanagari">
                    Noto Sans Devanagari
                  </option>
                  <option value="Noto Sans Display">Noto Sans Display</option>
                  <option value="Noto Sans Duployan">Noto Sans Duployan</option>
                  <option value="Noto Sans Egyptian Hieroglyphs">
                    Noto Sans Egyptian Hieroglyphs
                  </option>
                  <option value="Noto Sans Elbasan">Noto Sans Elbasan</option>
                  <option value="Noto Sans Elymaic">Noto Sans Elymaic</option>
                  <option value="Noto Sans Ethiopic">Noto Sans Ethiopic</option>
                  <option value="Noto Sans Georgian">Noto Sans Georgian</option>
                  <option value="Noto Sans Glagolitic">
                    Noto Sans Glagolitic
                  </option>
                  <option value="Noto Sans Gothic">Noto Sans Gothic</option>
                  <option value="Noto Sans Grantha">Noto Sans Grantha</option>
                  <option value="Noto Sans Gujarati">Noto Sans Gujarati</option>
                  <option value="Noto Sans Gunjala Gondi">
                    Noto Sans Gunjala Gondi
                  </option>
                  <option value="Noto Sans Gurmukhi">Noto Sans Gurmukhi</option>
                  <option value="Noto Sans HK">Noto Sans HK</option>
                  <option value="Noto Sans Hanifi Rohingya">
                    Noto Sans Hanifi Rohingya
                  </option>
                  <option value="Noto Sans Hanunoo">Noto Sans Hanunoo</option>
                  <option value="Noto Sans Hatran">Noto Sans Hatran</option>
                  <option value="Noto Sans Hebrew">Noto Sans Hebrew</option>
                  <option value="Noto Sans Imperial Aramaic">
                    Noto Sans Imperial Aramaic
                  </option>
                  <option value="Noto Sans Indic Siyaq Numbers">
                    Noto Sans Indic Siyaq Numbers
                  </option>
                  <option value="Noto Sans Inscriptional Pahlavi">
                    Noto Sans Inscriptional Pahlavi
                  </option>
                  <option value="Noto Sans Inscriptional Parthian">
                    Noto Sans Inscriptional Parthian
                  </option>
                  <option value="Noto Sans JP">Noto Sans JP</option>
                  <option value="Noto Sans Javanese">Noto Sans Javanese</option>
                  <option value="Noto Sans KR">Noto Sans KR</option>
                  <option value="Noto Sans Kaithi">Noto Sans Kaithi</option>
                  <option value="Noto Sans Kannada">Noto Sans Kannada</option>
                  <option value="Noto Sans Kawi">Noto Sans Kawi</option>
                  <option value="Noto Sans Kayah Li">Noto Sans Kayah Li</option>
                  <option value="Noto Sans Kharoshthi">
                    Noto Sans Kharoshthi
                  </option>
                  <option value="Noto Sans Khmer">Noto Sans Khmer</option>
                  <option value="Noto Sans Khojki">Noto Sans Khojki</option>
                  <option value="Noto Sans Khudawadi">
                    Noto Sans Khudawadi
                  </option>
                  <option value="Noto Sans Lao">Noto Sans Lao</option>
                  <option value="Noto Sans Lao Looped">
                    Noto Sans Lao Looped
                  </option>
                  <option value="Noto Sans Lepcha">Noto Sans Lepcha</option>
                  <option value="Noto Sans Limbu">Noto Sans Limbu</option>
                  <option value="Noto Sans Linear A">Noto Sans Linear A</option>
                  <option value="Noto Sans Linear B">Noto Sans Linear B</option>
                  <option value="Noto Sans Lisu">Noto Sans Lisu</option>
                  <option value="Noto Sans Lycian">Noto Sans Lycian</option>
                  <option value="Noto Sans Lydian">Noto Sans Lydian</option>
                  <option value="Noto Sans Mahajani">Noto Sans Mahajani</option>
                  <option value="Noto Sans Malayalam">
                    Noto Sans Malayalam
                  </option>
                  <option value="Noto Sans Mandaic">Noto Sans Mandaic</option>
                  <option value="Noto Sans Manichaean">
                    Noto Sans Manichaean
                  </option>
                  <option value="Noto Sans Marchen">Noto Sans Marchen</option>
                  <option value="Noto Sans Masaram Gondi">
                    Noto Sans Masaram Gondi
                  </option>
                  <option value="Noto Sans Math">Noto Sans Math</option>
                  <option value="Noto Sans Mayan Numerals">
                    Noto Sans Mayan Numerals
                  </option>
                  <option value="Noto Sans Medefaidrin">
                    Noto Sans Medefaidrin
                  </option>
                  <option value="Noto Sans Meetei Mayek">
                    Noto Sans Meetei Mayek
                  </option>
                  <option value="Noto Sans Mende Kikakui">
                    Noto Sans Mende Kikakui
                  </option>
                  <option value="Noto Sans Meroitic">Noto Sans Meroitic</option>
                  <option value="Noto Sans Miao">Noto Sans Miao</option>
                  <option value="Noto Sans Modi">Noto Sans Modi</option>
                  <option value="Noto Sans Mongolian">
                    Noto Sans Mongolian
                  </option>
                  <option value="Noto Sans Mono">Noto Sans Mono</option>
                  <option value="Noto Sans Mro">Noto Sans Mro</option>
                  <option value="Noto Sans Multani">Noto Sans Multani</option>
                  <option value="Noto Sans Myanmar">Noto Sans Myanmar</option>
                  <option value="Noto Sans NKo">Noto Sans NKo</option>
                  <option value="Noto Sans NKo Unjoined">
                    Noto Sans NKo Unjoined
                  </option>
                  <option value="Noto Sans Nabataean">
                    Noto Sans Nabataean
                  </option>
                  <option value="Noto Sans Nag Mundari">
                    Noto Sans Nag Mundari
                  </option>
                  <option value="Noto Sans Nandinagari">
                    Noto Sans Nandinagari
                  </option>
                  <option value="Noto Sans New Tai Lue">
                    Noto Sans New Tai Lue
                  </option>
                  <option value="Noto Sans Newa">Noto Sans Newa</option>
                  <option value="Noto Sans Nushu">Noto Sans Nushu</option>
                  <option value="Noto Sans Ogham">Noto Sans Ogham</option>
                  <option value="Noto Sans Ol Chiki">Noto Sans Ol Chiki</option>
                  <option value="Noto Sans Old Hungarian">
                    Noto Sans Old Hungarian
                  </option>
                  <option value="Noto Sans Old Italic">
                    Noto Sans Old Italic
                  </option>
                  <option value="Noto Sans Old North Arabian">
                    Noto Sans Old North Arabian
                  </option>
                  <option value="Noto Sans Old Permic">
                    Noto Sans Old Permic
                  </option>
                  <option value="Noto Sans Old Persian">
                    Noto Sans Old Persian
                  </option>
                  <option value="Noto Sans Old Sogdian">
                    Noto Sans Old Sogdian
                  </option>
                  <option value="Noto Sans Old South Arabian">
                    Noto Sans Old South Arabian
                  </option>
                  <option value="Noto Sans Old Turkic">
                    Noto Sans Old Turkic
                  </option>
                  <option value="Noto Sans Oriya">Noto Sans Oriya</option>
                  <option value="Noto Sans Osage">Noto Sans Osage</option>
                  <option value="Noto Sans Osmanya">Noto Sans Osmanya</option>
                  <option value="Noto Sans Pahawh Hmong">
                    Noto Sans Pahawh Hmong
                  </option>
                  <option value="Noto Sans Palmyrene">
                    Noto Sans Palmyrene
                  </option>
                  <option value="Noto Sans Pau Cin Hau">
                    Noto Sans Pau Cin Hau
                  </option>
                  <option value="Noto Sans Phags Pa">Noto Sans Phags Pa</option>
                  <option value="Noto Sans Phoenician">
                    Noto Sans Phoenician
                  </option>
                  <option value="Noto Sans Psalter Pahlavi">
                    Noto Sans Psalter Pahlavi
                  </option>
                  <option value="Noto Sans Rejang">Noto Sans Rejang</option>
                  <option value="Noto Sans Runic">Noto Sans Runic</option>
                  <option value="Noto Sans SC">Noto Sans SC</option>
                  <option value="Noto Sans Samaritan">
                    Noto Sans Samaritan
                  </option>
                  <option value="Noto Sans Saurashtra">
                    Noto Sans Saurashtra
                  </option>
                  <option value="Noto Sans Sharada">Noto Sans Sharada</option>
                  <option value="Noto Sans Shavian">Noto Sans Shavian</option>
                  <option value="Noto Sans Siddham">Noto Sans Siddham</option>
                  <option value="Noto Sans SignWriting">
                    Noto Sans SignWriting
                  </option>
                  <option value="Noto Sans Sinhala">Noto Sans Sinhala</option>
                  <option value="Noto Sans Sogdian">Noto Sans Sogdian</option>
                  <option value="Noto Sans Sora Sompeng">
                    Noto Sans Sora Sompeng
                  </option>
                  <option value="Noto Sans Soyombo">Noto Sans Soyombo</option>
                  <option value="Noto Sans Sundanese">
                    Noto Sans Sundanese
                  </option>
                  <option value="Noto Sans Syloti Nagri">
                    Noto Sans Syloti Nagri
                  </option>
                  <option value="Noto Sans Symbols">Noto Sans Symbols</option>
                  <option value="Noto Sans Symbols 2">
                    Noto Sans Symbols 2
                  </option>
                  <option value="Noto Sans Syriac">Noto Sans Syriac</option>
                  <option value="Noto Sans Syriac Eastern">
                    Noto Sans Syriac Eastern
                  </option>
                  <option value="Noto Sans TC">Noto Sans TC</option>
                  <option value="Noto Sans Tagalog">Noto Sans Tagalog</option>
                  <option value="Noto Sans Tagbanwa">Noto Sans Tagbanwa</option>
                  <option value="Noto Sans Tai Le">Noto Sans Tai Le</option>
                  <option value="Noto Sans Tai Tham">Noto Sans Tai Tham</option>
                  <option value="Noto Sans Tai Viet">Noto Sans Tai Viet</option>
                  <option value="Noto Sans Takri">Noto Sans Takri</option>
                  <option value="Noto Sans Tamil">Noto Sans Tamil</option>
                  <option value="Noto Sans Tamil Supplement">
                    Noto Sans Tamil Supplement
                  </option>
                  <option value="Noto Sans Tangsa">Noto Sans Tangsa</option>
                  <option value="Noto Sans Telugu">Noto Sans Telugu</option>
                  <option value="Noto Sans Thaana">Noto Sans Thaana</option>
                  <option value="Noto Sans Thai">Noto Sans Thai</option>
                  <option value="Noto Sans Thai Looped">
                    Noto Sans Thai Looped
                  </option>
                  <option value="Noto Sans Tifinagh">Noto Sans Tifinagh</option>
                  <option value="Noto Sans Tirhuta">Noto Sans Tirhuta</option>
                  <option value="Noto Sans Ugaritic">Noto Sans Ugaritic</option>
                  <option value="Noto Sans Vai">Noto Sans Vai</option>
                  <option value="Noto Sans Vithkuqi">Noto Sans Vithkuqi</option>
                  <option value="Noto Sans Wancho">Noto Sans Wancho</option>
                  <option value="Noto Sans Warang Citi">
                    Noto Sans Warang Citi
                  </option>
                  <option value="Noto Sans Yi">Noto Sans Yi</option>
                  <option value="Noto Sans Zanabazar Square">
                    Noto Sans Zanabazar Square
                  </option>
                  <option value="Noto Serif">Noto Serif</option>
                  <option value="Noto Serif Ahom">Noto Serif Ahom</option>
                  <option value="Noto Serif Armenian">
                    Noto Serif Armenian
                  </option>
                  <option value="Noto Serif Balinese">
                    Noto Serif Balinese
                  </option>
                  <option value="Noto Serif Bengali">Noto Serif Bengali</option>
                  <option value="Noto Serif Devanagari">
                    Noto Serif Devanagari
                  </option>
                  <option value="Noto Serif Display">Noto Serif Display</option>
                  <option value="Noto Serif Dogra">Noto Serif Dogra</option>
                  <option value="Noto Serif Ethiopic">
                    Noto Serif Ethiopic
                  </option>
                  <option value="Noto Serif Georgian">
                    Noto Serif Georgian
                  </option>
                  <option value="Noto Serif Grantha">Noto Serif Grantha</option>
                  <option value="Noto Serif Gujarati">
                    Noto Serif Gujarati
                  </option>
                  <option value="Noto Serif Gurmukhi">
                    Noto Serif Gurmukhi
                  </option>
                  <option value="Noto Serif HK">Noto Serif HK</option>
                  <option value="Noto Serif Hebrew">Noto Serif Hebrew</option>
                  <option value="Noto Serif JP">Noto Serif JP</option>
                  <option value="Noto Serif KR">Noto Serif KR</option>
                  <option value="Noto Serif Kannada">Noto Serif Kannada</option>
                  <option value="Noto Serif Khitan Small Script">
                    Noto Serif Khitan Small Script
                  </option>
                  <option value="Noto Serif Khmer">Noto Serif Khmer</option>
                  <option value="Noto Serif Khojki">Noto Serif Khojki</option>
                  <option value="Noto Serif Lao">Noto Serif Lao</option>
                  <option value="Noto Serif Makasar">Noto Serif Makasar</option>
                  <option value="Noto Serif Malayalam">
                    Noto Serif Malayalam
                  </option>
                  <option value="Noto Serif Myanmar">Noto Serif Myanmar</option>
                  <option value="Noto Serif NP Hmong">
                    Noto Serif NP Hmong
                  </option>
                  <option value="Noto Serif Old Uyghur">
                    Noto Serif Old Uyghur
                  </option>
                  <option value="Noto Serif Oriya">Noto Serif Oriya</option>
                  <option value="Noto Serif Ottoman Siyaq">
                    Noto Serif Ottoman Siyaq
                  </option>
                  <option value="Noto Serif SC">Noto Serif SC</option>
                  <option value="Noto Serif Sinhala">Noto Serif Sinhala</option>
                  <option value="Noto Serif TC">Noto Serif TC</option>
                  <option value="Noto Serif Tamil">Noto Serif Tamil</option>
                  <option value="Noto Serif Tangut">Noto Serif Tangut</option>
                  <option value="Noto Serif Telugu">Noto Serif Telugu</option>
                  <option value="Noto Serif Thai">Noto Serif Thai</option>
                  <option value="Noto Serif Tibetan">Noto Serif Tibetan</option>
                  <option value="Noto Serif Toto">Noto Serif Toto</option>
                  <option value="Noto Serif Vithkuqi">
                    Noto Serif Vithkuqi
                  </option>
                  <option value="Noto Serif Yezidi">Noto Serif Yezidi</option>
                  <option value="Noto Traditional Nushu">
                    Noto Traditional Nushu
                  </option>
                  <option value="Noto Znamenny Musical Notation">
                    Noto Znamenny Musical Notation
                  </option>
                  <option value="Nova Cut">Nova Cut</option>
                  <option value="Nova Flat">Nova Flat</option>
                  <option value="Nova Mono">Nova Mono</option>
                  <option value="Nova Oval">Nova Oval</option>
                  <option value="Nova Round">Nova Round</option>
                  <option value="Nova Script">Nova Script</option>
                  <option value="Nova Slim">Nova Slim</option>
                  <option value="Nova Square">Nova Square</option>
                  <option value="Numans">Numans</option>
                  <option value="Nunito">Nunito</option>
                  <option value="Nunito Sans">Nunito Sans</option>
                  <option value="Nuosu SIL">Nuosu SIL</option>
                  <option value="Odibee Sans">Odibee Sans</option>
                  <option value="Odor Mean Chey">Odor Mean Chey</option>
                  <option value="Offside">Offside</option>
                  <option value="Oi">Oi</option>
                  <option value="Ojuju">Ojuju</option>
                  <option value="Old Standard TT">Old Standard TT</option>
                  <option value="Oldenburg">Oldenburg</option>
                  <option value="Ole">Ole</option>
                  <option value="Oleo Script">Oleo Script</option>
                  <option value="Oleo Script Swash Caps">
                    Oleo Script Swash Caps
                  </option>
                  <option value="Onest">Onest</option>
                  <option value="Oooh Baby">Oooh Baby</option>
                  <option value="Open Sans">Open Sans</option>
                  <option value="Oranienbaum">Oranienbaum</option>
                  <option value="Orbit">Orbit</option>
                  <option value="Orbitron">Orbitron</option>
                  <option value="Oregano">Oregano</option>
                  <option value="Orelega One">Orelega One</option>
                  <option value="Orienta">Orienta</option>
                  <option value="Original Surfer">Original Surfer</option>
                  <option value="Oswald">Oswald</option>
                  <option value="Outfit">Outfit</option>
                  <option value="Over the Rainbow">Over the Rainbow</option>
                  <option value="Overlock">Overlock</option>
                  <option value="Overlock SC">Overlock SC</option>
                  <option value="Overpass">Overpass</option>
                  <option value="Overpass Mono">Overpass Mono</option>
                  <option value="Ovo">Ovo</option>
                  <option value="Oxanium">Oxanium</option>
                  <option value="Oxygen">Oxygen</option>
                  <option value="Oxygen Mono">Oxygen Mono</option>
                  <option value="PT Mono">PT Mono</option>
                  <option value="PT Sans">PT Sans</option>
                  <option value="PT Sans Caption">PT Sans Caption</option>
                  <option value="PT Sans Narrow">PT Sans Narrow</option>
                  <option value="PT Serif">PT Serif</option>
                  <option value="PT Serif Caption">PT Serif Caption</option>
                  <option value="Pacifico">Pacifico</option>
                  <option value="Padauk">Padauk</option>
                  <option value="Padyakke Expanded One">
                    Padyakke Expanded One
                  </option>
                  <option value="Palanquin">Palanquin</option>
                  <option value="Palanquin Dark">Palanquin Dark</option>
                  <option value="Palette Mosaic">Palette Mosaic</option>
                  <option value="Pangolin">Pangolin</option>
                  <option value="Paprika">Paprika</option>
                  <option value="Parisienne">Parisienne</option>
                  <option value="Passero One">Passero One</option>
                  <option value="Passion One">Passion One</option>
                  <option value="Passions Conflict">Passions Conflict</option>
                  <option value="Pathway Extreme">Pathway Extreme</option>
                  <option value="Pathway Gothic One">Pathway Gothic One</option>
                  <option value="Patrick Hand">Patrick Hand</option>
                  <option value="Patrick Hand SC">Patrick Hand SC</option>
                  <option value="Pattaya">Pattaya</option>
                  <option value="Patua One">Patua One</option>
                  <option value="Pavanam">Pavanam</option>
                  <option value="Paytone One">Paytone One</option>
                  <option value="Peddana">Peddana</option>
                  <option value="Peralta">Peralta</option>
                  <option value="Permanent Marker">Permanent Marker</option>
                  <option value="Petemoss">Petemoss</option>
                  <option value="Petit Formal Script">
                    Petit Formal Script
                  </option>
                  <option value="Petrona">Petrona</option>
                  <option value="Philosopher">Philosopher</option>
                  <option value="Phudu">Phudu</option>
                  <option value="Piazzolla">Piazzolla</option>
                  <option value="Piedra">Piedra</option>
                  <option value="Pinyon Script">Pinyon Script</option>
                  <option value="Pirata One">Pirata One</option>
                  <option value="Pixelify Sans">Pixelify Sans</option>
                  <option value="Plaster">Plaster</option>
                  <option value="Platypi">Platypi</option>
                  <option value="Play">Play</option>
                  <option value="Playball">Playball</option>
                  <option value="Playfair">Playfair</option>
                  <option value="Playfair Display">Playfair Display</option>
                  <option value="Playfair Display SC">
                    Playfair Display SC
                  </option>
                  <option value="Playpen Sans">Playpen Sans</option>
                  <option value="Playwrite AR">Playwrite AR</option>
                  <option value="Playwrite AT">Playwrite AT</option>
                  <option value="Playwrite AU NSW">Playwrite AU NSW</option>
                  <option value="Playwrite AU QLD">Playwrite AU QLD</option>
                  <option value="Playwrite AU SA">Playwrite AU SA</option>
                  <option value="Playwrite AU TAS">Playwrite AU TAS</option>
                  <option value="Playwrite AU VIC">Playwrite AU VIC</option>
                  <option value="Playwrite BE VLG">Playwrite BE VLG</option>
                  <option value="Playwrite BE WAL">Playwrite BE WAL</option>
                  <option value="Playwrite BR">Playwrite BR</option>
                  <option value="Playwrite CA">Playwrite CA</option>
                  <option value="Playwrite CL">Playwrite CL</option>
                  <option value="Playwrite CO">Playwrite CO</option>
                  <option value="Playwrite CU">Playwrite CU</option>
                  <option value="Playwrite CZ">Playwrite CZ</option>
                  <option value="Playwrite DE Grund">Playwrite DE Grund</option>
                  <option value="Playwrite DE LA">Playwrite DE LA</option>
                  <option value="Playwrite DE SAS">Playwrite DE SAS</option>
                  <option value="Playwrite DE VA">Playwrite DE VA</option>
                  <option value="Playwrite DK Loopet">
                    Playwrite DK Loopet
                  </option>
                  <option value="Playwrite DK Uloopet">
                    Playwrite DK Uloopet
                  </option>
                  <option value="Playwrite ES">Playwrite ES</option>
                  <option value="Playwrite ES Deco">Playwrite ES Deco</option>
                  <option value="Playwrite FR Moderne">
                    Playwrite FR Moderne
                  </option>
                  <option value="Playwrite FR Trad">Playwrite FR Trad</option>
                  <option value="Playwrite GB J">Playwrite GB J</option>
                  <option value="Playwrite GB S">Playwrite GB S</option>
                  <option value="Playwrite HR">Playwrite HR</option>
                  <option value="Playwrite HR Lijeva">
                    Playwrite HR Lijeva
                  </option>
                  <option value="Playwrite HU">Playwrite HU</option>
                  <option value="Playwrite ID">Playwrite ID</option>
                  <option value="Playwrite IE">Playwrite IE</option>
                  <option value="Playwrite IN">Playwrite IN</option>
                  <option value="Playwrite IS">Playwrite IS</option>
                  <option value="Playwrite IT Moderna">
                    Playwrite IT Moderna
                  </option>
                  <option value="Playwrite IT Trad">Playwrite IT Trad</option>
                  <option value="Playwrite MX">Playwrite MX</option>
                  <option value="Playwrite NG Modern">
                    Playwrite NG Modern
                  </option>
                  <option value="Playwrite NL">Playwrite NL</option>
                  <option value="Playwrite NO">Playwrite NO</option>
                  <option value="Playwrite NZ">Playwrite NZ</option>
                  <option value="Playwrite PE">Playwrite PE</option>
                  <option value="Playwrite PL">Playwrite PL</option>
                  <option value="Playwrite PT">Playwrite PT</option>
                  <option value="Playwrite RO">Playwrite RO</option>
                  <option value="Playwrite SK">Playwrite SK</option>
                  <option value="Playwrite TZ">Playwrite TZ</option>
                  <option value="Playwrite US Modern">
                    Playwrite US Modern
                  </option>
                  <option value="Playwrite US Trad">Playwrite US Trad</option>
                  <option value="Playwrite VN">Playwrite VN</option>
                  <option value="Playwrite ZA">Playwrite ZA</option>
                  <option value="Plus Jakarta Sans">Plus Jakarta Sans</option>
                  <option value="Podkova">Podkova</option>
                  <option value="Poetsen One">Poetsen One</option>
                  <option value="Poiret One">Poiret One</option>
                  <option value="Poller One">Poller One</option>
                  <option value="Poltawski Nowy">Poltawski Nowy</option>
                  <option value="Poly">Poly</option>
                  <option value="Pompiere">Pompiere</option>
                  <option value="Pontano Sans">Pontano Sans</option>
                  <option value="Poor Story">Poor Story</option>
                  <option value="Poppins">Poppins</option>
                  <option value="Port Lligat Sans">Port Lligat Sans</option>
                  <option value="Port Lligat Slab">Port Lligat Slab</option>
                  <option value="Potta One">Potta One</option>
                  <option value="Pragati Narrow">Pragati Narrow</option>
                  <option value="Praise">Praise</option>
                  <option value="Prata">Prata</option>
                  <option value="Preahvihear">Preahvihear</option>
                  <option value="Press Start 2P">Press Start 2P</option>
                  <option value="Pridi">Pridi</option>
                  <option value="Princess Sofia">Princess Sofia</option>
                  <option value="Prociono">Prociono</option>
                  <option value="Prompt">Prompt</option>
                  <option value="Prosto One">Prosto One</option>
                  <option value="Protest Guerrilla">Protest Guerrilla</option>
                  <option value="Protest Revolution">Protest Revolution</option>
                  <option value="Protest Riot">Protest Riot</option>
                  <option value="Protest Strike">Protest Strike</option>
                  <option value="Proza Libre">Proza Libre</option>
                  <option value="Public Sans">Public Sans</option>
                  <option value="Puppies Play">Puppies Play</option>
                  <option value="Puritan">Puritan</option>
                  <option value="Purple Purse">Purple Purse</option>
                  <option value="Qahiri">Qahiri</option>
                  <option value="Quando">Quando</option>
                  <option value="Quantico">Quantico</option>
                  <option value="Quattrocento">Quattrocento</option>
                  <option value="Quattrocento Sans">Quattrocento Sans</option>
                  <option value="Questrial">Questrial</option>
                  <option value="Quicksand">Quicksand</option>
                  <option value="Quintessential">Quintessential</option>
                  <option value="Qwigley">Qwigley</option>
                  <option value="Qwitcher Grypen">Qwitcher Grypen</option>
                  <option value="REM">REM</option>
                  <option value="Racing Sans One">Racing Sans One</option>
                  <option value="Radio Canada">Radio Canada</option>
                  <option value="Radio Canada Big">Radio Canada Big</option>
                  <option value="Radley">Radley</option>
                  <option value="Rajdhani">Rajdhani</option>
                  <option value="Rakkas">Rakkas</option>
                  <option value="Raleway">Raleway</option>
                  <option value="Raleway Dots">Raleway Dots</option>
                  <option value="Ramabhadra">Ramabhadra</option>
                  <option value="Ramaraja">Ramaraja</option>
                  <option value="Rambla">Rambla</option>
                  <option value="Rammetto One">Rammetto One</option>
                  <option value="Rampart One">Rampart One</option>
                  <option value="Ranchers">Ranchers</option>
                  <option value="Rancho">Rancho</option>
                  <option value="Ranga">Ranga</option>
                  <option value="Rasa">Rasa</option>
                  <option value="Rationale">Rationale</option>
                  <option value="Ravi Prakash">Ravi Prakash</option>
                  <option value="Readex Pro">Readex Pro</option>
                  <option value="Recursive">Recursive</option>
                  <option value="Red Hat Display">Red Hat Display</option>
                  <option value="Red Hat Mono">Red Hat Mono</option>
                  <option value="Red Hat Text">Red Hat Text</option>
                  <option value="Red Rose">Red Rose</option>
                  <option value="Redacted">Redacted</option>
                  <option value="Redacted Script">Redacted Script</option>
                  <option value="Reddit Mono">Reddit Mono</option>
                  <option value="Reddit Sans">Reddit Sans</option>
                  <option value="Reddit Sans Condensed">
                    Reddit Sans Condensed
                  </option>
                  <option value="Redressed">Redressed</option>
                  <option value="Reem Kufi">Reem Kufi</option>
                  <option value="Reem Kufi Fun">Reem Kufi Fun</option>
                  <option value="Reem Kufi Ink">Reem Kufi Ink</option>
                  <option value="Reenie Beanie">Reenie Beanie</option>
                  <option value="Reggae One">Reggae One</option>
                  <option value="Rethink Sans">Rethink Sans</option>
                  <option value="Revalia">Revalia</option>
                  <option value="Rhodium Libre">Rhodium Libre</option>
                  <option value="Ribeye">Ribeye</option>
                  <option value="Ribeye Marrow">Ribeye Marrow</option>
                  <option value="Righteous">Righteous</option>
                  <option value="Risque">Risque</option>
                  <option value="Road Rage">Road Rage</option>
                  <option
                    value="Roboto"
                    selected="selected"
                    data-select2-id="select2-data-3-d0gr"
                  >
                    Roboto
                  </option>
                  <option value="Roboto Condensed">Roboto Condensed</option>
                  <option value="Roboto Flex">Roboto Flex</option>
                  <option value="Roboto Mono">Roboto Mono</option>
                  <option value="Roboto Serif">Roboto Serif</option>
                  <option value="Roboto Slab">Roboto Slab</option>
                  <option value="Rochester">Rochester</option>
                  <option value="Rock 3D">Rock 3D</option>
                  <option value="Rock Salt">Rock Salt</option>
                  <option value="RocknRoll One">RocknRoll One</option>
                  <option value="Rokkitt">Rokkitt</option>
                  <option value="Romanesco">Romanesco</option>
                  <option value="Ropa Sans">Ropa Sans</option>
                  <option value="Rosario">Rosario</option>
                  <option value="Rosarivo">Rosarivo</option>
                  <option value="Rouge Script">Rouge Script</option>
                  <option value="Rowdies">Rowdies</option>
                  <option value="Rozha One">Rozha One</option>
                  <option value="Rubik">Rubik</option>
                  <option value="Rubik 80s Fade">Rubik 80s Fade</option>
                  <option value="Rubik Beastly">Rubik Beastly</option>
                  <option value="Rubik Broken Fax">Rubik Broken Fax</option>
                  <option value="Rubik Bubbles">Rubik Bubbles</option>
                  <option value="Rubik Burned">Rubik Burned</option>
                  <option value="Rubik Dirt">Rubik Dirt</option>
                  <option value="Rubik Distressed">Rubik Distressed</option>
                  <option value="Rubik Doodle Shadow">
                    Rubik Doodle Shadow
                  </option>
                  <option value="Rubik Doodle Triangles">
                    Rubik Doodle Triangles
                  </option>
                  <option value="Rubik Gemstones">Rubik Gemstones</option>
                  <option value="Rubik Glitch">Rubik Glitch</option>
                  <option value="Rubik Glitch Pop">Rubik Glitch Pop</option>
                  <option value="Rubik Iso">Rubik Iso</option>
                  <option value="Rubik Lines">Rubik Lines</option>
                  <option value="Rubik Maps">Rubik Maps</option>
                  <option value="Rubik Marker Hatch">Rubik Marker Hatch</option>
                  <option value="Rubik Maze">Rubik Maze</option>
                  <option value="Rubik Microbe">Rubik Microbe</option>
                  <option value="Rubik Mono One">Rubik Mono One</option>
                  <option value="Rubik Moonrocks">Rubik Moonrocks</option>
                  <option value="Rubik Pixels">Rubik Pixels</option>
                  <option value="Rubik Puddles">Rubik Puddles</option>
                  <option value="Rubik Scribble">Rubik Scribble</option>
                  <option value="Rubik Spray Paint">Rubik Spray Paint</option>
                  <option value="Rubik Storm">Rubik Storm</option>
                  <option value="Rubik Vinyl">Rubik Vinyl</option>
                  <option value="Rubik Wet Paint">Rubik Wet Paint</option>
                  <option value="Ruda">Ruda</option>
                  <option value="Rufina">Rufina</option>
                  <option value="Ruge Boogie">Ruge Boogie</option>
                  <option value="Ruluko">Ruluko</option>
                  <option value="Rum Raisin">Rum Raisin</option>
                  <option value="Ruslan Display">Ruslan Display</option>
                  <option value="Russo One">Russo One</option>
                  <option value="Ruthie">Ruthie</option>
                  <option value="Ruwudu">Ruwudu</option>
                  <option value="Rye">Rye</option>
                  <option value="STIX Two Text">STIX Two Text</option>
                  <option value="SUSE">SUSE</option>
                  <option value="Sacramento">Sacramento</option>
                  <option value="Sahitya">Sahitya</option>
                  <option value="Sail">Sail</option>
                  <option value="Saira">Saira</option>
                  <option value="Saira Condensed">Saira Condensed</option>
                  <option value="Saira Extra Condensed">
                    Saira Extra Condensed
                  </option>
                  <option value="Saira Semi Condensed">
                    Saira Semi Condensed
                  </option>
                  <option value="Saira Stencil One">Saira Stencil One</option>
                  <option value="Salsa">Salsa</option>
                  <option value="Sanchez">Sanchez</option>
                  <option value="Sancreek">Sancreek</option>
                  <option value="Sankofa Display">Sankofa Display</option>
                  <option value="Sansita">Sansita</option>
                  <option value="Sansita Swashed">Sansita Swashed</option>
                  <option value="Sarabun">Sarabun</option>
                  <option value="Sarala">Sarala</option>
                  <option value="Sarina">Sarina</option>
                  <option value="Sarpanch">Sarpanch</option>
                  <option value="Sassy Frass">Sassy Frass</option>
                  <option value="Satisfy">Satisfy</option>
                  <option value="Sawarabi Gothic">Sawarabi Gothic</option>
                  <option value="Sawarabi Mincho">Sawarabi Mincho</option>
                  <option value="Scada">Scada</option>
                  <option value="Scheherazade New">Scheherazade New</option>
                  <option value="Schibsted Grotesk">Schibsted Grotesk</option>
                  <option value="Schoolbell">Schoolbell</option>
                  <option value="Scope One">Scope One</option>
                  <option value="Seaweed Script">Seaweed Script</option>
                  <option value="Secular One">Secular One</option>
                  <option value="Sedan">Sedan</option>
                  <option value="Sedan SC">Sedan SC</option>
                  <option value="Sedgwick Ave">Sedgwick Ave</option>
                  <option value="Sedgwick Ave Display">
                    Sedgwick Ave Display
                  </option>
                  <option value="Sen">Sen</option>
                  <option value="Send Flowers">Send Flowers</option>
                  <option value="Sevillana">Sevillana</option>
                  <option value="Seymour One">Seymour One</option>
                  <option value="Shadows Into Light">Shadows Into Light</option>
                  <option value="Shadows Into Light Two">
                    Shadows Into Light Two
                  </option>
                  <option value="Shalimar">Shalimar</option>
                  <option value="Shantell Sans">Shantell Sans</option>
                  <option value="Shanti">Shanti</option>
                  <option value="Share">Share</option>
                  <option value="Share Tech">Share Tech</option>
                  <option value="Share Tech Mono">Share Tech Mono</option>
                  <option value="Shippori Antique">Shippori Antique</option>
                  <option value="Shippori Antique B1">
                    Shippori Antique B1
                  </option>
                  <option value="Shippori Mincho">Shippori Mincho</option>
                  <option value="Shippori Mincho B1">Shippori Mincho B1</option>
                  <option value="Shizuru">Shizuru</option>
                  <option value="Shojumaru">Shojumaru</option>
                  <option value="Short Stack">Short Stack</option>
                  <option value="Shrikhand">Shrikhand</option>
                  <option value="Siemreap">Siemreap</option>
                  <option value="Sigmar">Sigmar</option>
                  <option value="Sigmar One">Sigmar One</option>
                  <option value="Signika">Signika</option>
                  <option value="Signika Negative">Signika Negative</option>
                  <option value="Silkscreen">Silkscreen</option>
                  <option value="Simonetta">Simonetta</option>
                  <option value="Single Day">Single Day</option>
                  <option value="Sintony">Sintony</option>
                  <option value="Sirin Stencil">Sirin Stencil</option>
                  <option value="Six Caps">Six Caps</option>
                  <option value="Sixtyfour">Sixtyfour</option>
                  <option value="Sixtyfour Convergence">
                    Sixtyfour Convergence
                  </option>
                  <option value="Skranji">Skranji</option>
                  <option value="Slabo 13px">Slabo 13px</option>
                  <option value="Slabo 27px">Slabo 27px</option>
                  <option value="Slackey">Slackey</option>
                  <option value="Slackside One">Slackside One</option>
                  <option value="Smokum">Smokum</option>
                  <option value="Smooch">Smooch</option>
                  <option value="Smooch Sans">Smooch Sans</option>
                  <option value="Smythe">Smythe</option>
                  <option value="Sniglet">Sniglet</option>
                  <option value="Snippet">Snippet</option>
                  <option value="Snowburst One">Snowburst One</option>
                  <option value="Sofadi One">Sofadi One</option>
                  <option value="Sofia">Sofia</option>
                  <option value="Sofia Sans">Sofia Sans</option>
                  <option value="Sofia Sans Condensed">
                    Sofia Sans Condensed
                  </option>
                  <option value="Sofia Sans Extra Condensed">
                    Sofia Sans Extra Condensed
                  </option>
                  <option value="Sofia Sans Semi Condensed">
                    Sofia Sans Semi Condensed
                  </option>
                  <option value="Solitreo">Solitreo</option>
                  <option value="Solway">Solway</option>
                  <option value="Sometype Mono">Sometype Mono</option>
                  <option value="Song Myung">Song Myung</option>
                  <option value="Sono">Sono</option>
                  <option value="Sonsie One">Sonsie One</option>
                  <option value="Sora">Sora</option>
                  <option value="Sorts Mill Goudy">Sorts Mill Goudy</option>
                  <option value="Sour Gummy">Sour Gummy</option>
                  <option value="Source Code Pro">Source Code Pro</option>
                  <option value="Source Sans 3">Source Sans 3</option>
                  <option value="Source Serif 4">Source Serif 4</option>
                  <option value="Space Grotesk">Space Grotesk</option>
                  <option value="Space Mono">Space Mono</option>
                  <option value="Special Elite">Special Elite</option>
                  <option value="Spectral">Spectral</option>
                  <option value="Spectral SC">Spectral SC</option>
                  <option value="Spicy Rice">Spicy Rice</option>
                  <option value="Spinnaker">Spinnaker</option>
                  <option value="Spirax">Spirax</option>
                  <option value="Splash">Splash</option>
                  <option value="Spline Sans">Spline Sans</option>
                  <option value="Spline Sans Mono">Spline Sans Mono</option>
                  <option value="Squada One">Squada One</option>
                  <option value="Square Peg">Square Peg</option>
                  <option value="Sree Krushnadevaraya">
                    Sree Krushnadevaraya
                  </option>
                  <option value="Sriracha">Sriracha</option>
                  <option value="Srisakdi">Srisakdi</option>
                  <option value="Staatliches">Staatliches</option>
                  <option value="Stalemate">Stalemate</option>
                  <option value="Stalinist One">Stalinist One</option>
                  <option value="Stardos Stencil">Stardos Stencil</option>
                  <option value="Stick">Stick</option>
                  <option value="Stick No Bills">Stick No Bills</option>
                  <option value="Stint Ultra Condensed">
                    Stint Ultra Condensed
                  </option>
                  <option value="Stint Ultra Expanded">
                    Stint Ultra Expanded
                  </option>
                  <option value="Stoke">Stoke</option>
                  <option value="Strait">Strait</option>
                  <option value="Style Script">Style Script</option>
                  <option value="Stylish">Stylish</option>
                  <option value="Sue Ellen Francisco">
                    Sue Ellen Francisco
                  </option>
                  <option value="Suez One">Suez One</option>
                  <option value="Sulphur Point">Sulphur Point</option>
                  <option value="Sumana">Sumana</option>
                  <option value="Sunflower">Sunflower</option>
                  <option value="Sunshiney">Sunshiney</option>
                  <option value="Supermercado One">Supermercado One</option>
                  <option value="Sura">Sura</option>
                  <option value="Suranna">Suranna</option>
                  <option value="Suravaram">Suravaram</option>
                  <option value="Suwannaphum">Suwannaphum</option>
                  <option value="Swanky and Moo Moo">Swanky and Moo Moo</option>
                  <option value="Syncopate">Syncopate</option>
                  <option value="Syne">Syne</option>
                  <option value="Syne Mono">Syne Mono</option>
                  <option value="Syne Tactile">Syne Tactile</option>
                  <option value="Tac One">Tac One</option>
                  <option value="Tai Heritage Pro">Tai Heritage Pro</option>
                  <option value="Tajawal">Tajawal</option>
                  <option value="Tangerine">Tangerine</option>
                  <option value="Tapestry">Tapestry</option>
                  <option value="Taprom">Taprom</option>
                  <option value="Tauri">Tauri</option>
                  <option value="Taviraj">Taviraj</option>
                  <option value="Teachers">Teachers</option>
                  <option value="Teko">Teko</option>
                  <option value="Tektur">Tektur</option>
                  <option value="Telex">Telex</option>
                  <option value="Tenali Ramakrishna">Tenali Ramakrishna</option>
                  <option value="Tenor Sans">Tenor Sans</option>
                  <option value="Text Me One">Text Me One</option>
                  <option value="Texturina">Texturina</option>
                  <option value="Thasadith">Thasadith</option>
                  <option value="The Girl Next Door">The Girl Next Door</option>
                  <option value="The Nautigal">The Nautigal</option>
                  <option value="Tienne">Tienne</option>
                  <option value="Tillana">Tillana</option>
                  <option value="Tilt Neon">Tilt Neon</option>
                  <option value="Tilt Prism">Tilt Prism</option>
                  <option value="Tilt Warp">Tilt Warp</option>
                  <option value="Timmana">Timmana</option>
                  <option value="Tinos">Tinos</option>
                  <option value="Tiny5">Tiny5</option>
                  <option value="Tiro Bangla">Tiro Bangla</option>
                  <option value="Tiro Devanagari Hindi">
                    Tiro Devanagari Hindi
                  </option>
                  <option value="Tiro Devanagari Marathi">
                    Tiro Devanagari Marathi
                  </option>
                  <option value="Tiro Devanagari Sanskrit">
                    Tiro Devanagari Sanskrit
                  </option>
                  <option value="Tiro Gurmukhi">Tiro Gurmukhi</option>
                  <option value="Tiro Kannada">Tiro Kannada</option>
                  <option value="Tiro Tamil">Tiro Tamil</option>
                  <option value="Tiro Telugu">Tiro Telugu</option>
                  <option value="Titan One">Titan One</option>
                  <option value="Titillium Web">Titillium Web</option>
                  <option value="Tomorrow">Tomorrow</option>
                  <option value="Tourney">Tourney</option>
                  <option value="Trade Winds">Trade Winds</option>
                  <option value="Train One">Train One</option>
                  <option value="Trirong">Trirong</option>
                  <option value="Trispace">Trispace</option>
                  <option value="Trocchi">Trocchi</option>
                  <option value="Trochut">Trochut</option>
                  <option value="Truculenta">Truculenta</option>
                  <option value="Trykker">Trykker</option>
                  <option value="Tsukimi Rounded">Tsukimi Rounded</option>
                  <option value="Tulpen One">Tulpen One</option>
                  <option value="Turret Road">Turret Road</option>
                  <option value="Twinkle Star">Twinkle Star</option>
                  <option value="Ubuntu">Ubuntu</option>
                  <option value="Ubuntu Condensed">Ubuntu Condensed</option>
                  <option value="Ubuntu Mono">Ubuntu Mono</option>
                  <option value="Ubuntu Sans">Ubuntu Sans</option>
                  <option value="Ubuntu Sans Mono">Ubuntu Sans Mono</option>
                  <option value="Uchen">Uchen</option>
                  <option value="Ultra">Ultra</option>
                  <option value="Unbounded">Unbounded</option>
                  <option value="Uncial Antiqua">Uncial Antiqua</option>
                  <option value="Underdog">Underdog</option>
                  <option value="Unica One">Unica One</option>
                  <option value="UnifrakturCook">UnifrakturCook</option>
                  <option value="UnifrakturMaguntia">UnifrakturMaguntia</option>
                  <option value="Unkempt">Unkempt</option>
                  <option value="Unlock">Unlock</option>
                  <option value="Unna">Unna</option>
                  <option value="Updock">Updock</option>
                  <option value="Urbanist">Urbanist</option>
                  <option value="VT323">VT323</option>
                  <option value="Vampiro One">Vampiro One</option>
                  <option value="Varela">Varela</option>
                  <option value="Varela Round">Varela Round</option>
                  <option value="Varta">Varta</option>
                  <option value="Vast Shadow">Vast Shadow</option>
                  <option value="Vazirmatn">Vazirmatn</option>
                  <option value="Vesper Libre">Vesper Libre</option>
                  <option value="Viaoda Libre">Viaoda Libre</option>
                  <option value="Vibes">Vibes</option>
                  <option value="Vibur">Vibur</option>
                  <option value="Victor Mono">Victor Mono</option>
                  <option value="Vidaloka">Vidaloka</option>
                  <option value="Viga">Viga</option>
                  <option value="Vina Sans">Vina Sans</option>
                  <option value="Voces">Voces</option>
                  <option value="Volkhov">Volkhov</option>
                  <option value="Vollkorn">Vollkorn</option>
                  <option value="Vollkorn SC">Vollkorn SC</option>
                  <option value="Voltaire">Voltaire</option>
                  <option value="Vujahday Script">Vujahday Script</option>
                  <option value="Waiting for the Sunrise">
                    Waiting for the Sunrise
                  </option>
                  <option value="Wallpoet">Wallpoet</option>
                  <option value="Walter Turncoat">Walter Turncoat</option>
                  <option value="Warnes">Warnes</option>
                  <option value="Water Brush">Water Brush</option>
                  <option value="Waterfall">Waterfall</option>
                  <option value="Wavefont">Wavefont</option>
                  <option value="Wellfleet">Wellfleet</option>
                  <option value="Wendy One">Wendy One</option>
                  <option value="Whisper">Whisper</option>
                  <option value="WindSong">WindSong</option>
                  <option value="Wire One">Wire One</option>
                  <option value="Wittgenstein">Wittgenstein</option>
                  <option value="Wix Madefor Display">
                    Wix Madefor Display
                  </option>
                  <option value="Wix Madefor Text">Wix Madefor Text</option>
                  <option value="Work Sans">Work Sans</option>
                  <option value="Workbench">Workbench</option>
                  <option value="Xanh Mono">Xanh Mono</option>
                  <option value="Yaldevi">Yaldevi</option>
                  <option value="Yanone Kaffeesatz">Yanone Kaffeesatz</option>
                  <option value="Yantramanav">Yantramanav</option>
                  <option value="Yarndings 12">Yarndings 12</option>
                  <option value="Yarndings 12 Charted">
                    Yarndings 12 Charted
                  </option>
                  <option value="Yarndings 20">Yarndings 20</option>
                  <option value="Yarndings 20 Charted">
                    Yarndings 20 Charted
                  </option>
                  <option value="Yatra One">Yatra One</option>
                  <option value="Yellowtail">Yellowtail</option>
                  <option value="Yeon Sung">Yeon Sung</option>
                  <option value="Yeseva One">Yeseva One</option>
                  <option value="Yesteryear">Yesteryear</option>
                  <option value="Yomogi">Yomogi</option>
                  <option value="Young Serif">Young Serif</option>
                  <option value="Yrsa">Yrsa</option>
                  <option value="Ysabeau">Ysabeau</option>
                  <option value="Ysabeau Infant">Ysabeau Infant</option>
                  <option value="Ysabeau Office">Ysabeau Office</option>
                  <option value="Ysabeau SC">Ysabeau SC</option>
                  <option value="Yuji Boku">Yuji Boku</option>
                  <option value="Yuji Hentaigana Akari">
                    Yuji Hentaigana Akari
                  </option>
                  <option value="Yuji Hentaigana Akebono">
                    Yuji Hentaigana Akebono
                  </option>
                  <option value="Yuji Mai">Yuji Mai</option>
                  <option value="Yuji Syuku">Yuji Syuku</option>
                  <option value="Yusei Magic">Yusei Magic</option>
                  <option value="ZCOOL KuaiLe">ZCOOL KuaiLe</option>
                  <option value="ZCOOL QingKe HuangYou">
                    ZCOOL QingKe HuangYou
                  </option>
                  <option value="ZCOOL XiaoWei">ZCOOL XiaoWei</option>
                  <option value="Zain">Zain</option>
                  <option value="Zen Antique">Zen Antique</option>
                  <option value="Zen Antique Soft">Zen Antique Soft</option>
                  <option value="Zen Dots">Zen Dots</option>
                  <option value="Zen Kaku Gothic Antique">
                    Zen Kaku Gothic Antique
                  </option>
                  <option value="Zen Kaku Gothic New">
                    Zen Kaku Gothic New
                  </option>
                  <option value="Zen Kurenaido">Zen Kurenaido</option>
                  <option value="Zen Loop">Zen Loop</option>
                  <option value="Zen Maru Gothic">Zen Maru Gothic</option>
                  <option value="Zen Old Mincho">Zen Old Mincho</option>
                  <option value="Zen Tokyo Zoo">Zen Tokyo Zoo</option>
                  <option value="Zeyada">Zeyada</option>
                  <option value="Zhi Mang Xing">Zhi Mang Xing</option>
                  <option value="Zilla Slab">Zilla Slab</option>
                  <option value="Zilla Slab Highlight">
                    Zilla Slab Highlight
                  </option></select
                ><span
                  class="select2 select2-container select2-container--default select2-container--focus"
                  dir="ltr"
                  data-select2-id="select2-data-2-39om"
                  style="width: 100%"
                  ><span class="selection"
                    ><span
                      class="select2-selection select2-selection--single"
                      role="combobox"
                      aria-haspopup="true"
                      aria-expanded="false"
                      tabindex="0"
                      aria-disabled="false"
                      aria-labelledby="select2--container"
                      aria-controls="select2--container"
                      ><span
                        class="select2-selection__rendered"
                        id="select2--container"
                        role="textbox"
                        aria-readonly="true"
                        title="Roboto"
                        >Roboto</span
                      ><span
                        class="select2-selection__arrow"
                        role="presentation"
                        ><b role="presentation"></b></span></span></span
                  ><span class="dropdown-wrapper" aria-hidden="true"></span
                ></span>
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="tp_h1_size">
                  Heading 1 font size
                </label>
                <input
                  class="form-control"
                  name="tp_h1_size"
                  type="number"
                  value="28"
                />
                <small class="form-hint"
                  >The font size in pixels (px). Default is
                  <code>28</code></small
                >
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="tp_h2_size">
                  Heading 2 font size
                </label>
                <input
                  class="form-control"
                  name="tp_h2_size"
                  type="number"
                  value="24"
                />
                <small class="form-hint"
                  >The font size in pixels (px). Default is
                  <code>24</code></small
                >
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="tp_h3_size">
                  Heading 3 font size
                </label>
                <input
                  class="form-control"
                  name="tp_h3_size"
                  type="number"
                  value="22"
                />
                <small class="form-hint"
                  >The font size in pixels (px). Default is
                  <code>22</code></small
                >
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="tp_h4_size">
                  Heading 4 font size
                </label>
                <input
                  class="form-control"
                  name="tp_h4_size"
                  type="number"
                  value="20"
                />
                <small class="form-hint"
                  >The font size in pixels (px). Default is
                  <code>20</code></small
                >
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="tp_h5_size">
                  Heading 5 font size
                </label>
                <input
                  class="form-control"
                  name="tp_h5_size"
                  type="number"
                  value="18"
                />
                <small class="form-hint"
                  >The font size in pixels (px). Default is
                  <code>18</code></small
                >
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="tp_h6_size">
                  Heading 6 font size
                </label>
                <input
                  class="form-control"
                  name="tp_h6_size"
                  type="number"
                  value="16"
                />
                <small class="form-hint"
                  >The font size in pixels (px). Default is
                  <code>16</code></small
                >
              </div>
              <div class="mb-3 position-relative">
                <label class="form-label" for="tp_body_size">
                  Body font size
                </label>
                <input
                  class="form-control"
                  name="tp_body_size"
                  type="number"
                  value="14"
                />
                <small class="form-hint"
                  >The font size in pixels (px). Default is
                  <code>14</code></small
                >
              </div>

              <div>
                <div class="mb-3 position-relative">
                  <label class="form-label" for="social_links">
                    Social Links
                  </label>
                  <input name="social_links" type="hidden" value="[]" />

                  <div
                    class="repeater-group"
                    id="repeater_field_ab30191f59c7d7f95998d9d2dfc936a2_6740decfa758c_group"
                    data-next-index="3"
                  >
                    <fieldset
                      class="form-fieldset position-relative"
                      data-id="repeater_field_ab30191f59c7d7f95998d9d2dfc936a2_6740decfa758c_0"
                      data-index="0"
                    >
                      <legend
                        class="d-flex justify-content-end align-items-center"
                      >
                        <button
                          class="btn btn-icon btn-sm position-absolute remove-item-button"
                          type="button"
                          data-target="repeater-remove"
                          data-id="repeater_field_ab30191f59c7d7f95998d9d2dfc936a2_6740decfa758c_0"
                        >
                          <svg
                            class="icon icon-sm icon-left svg-icon-ti-ti-x"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path
                              stroke="none"
                              d="M0 0h24v24H0z"
                              fill="none"
                            ></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                          </svg>
                        </button>
                      </legend>

                      <div>
                        <div class="repeater-item-group">
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Name </label>

                            <input
                              name="social_links[0][0][key]"
                              type="hidden"
                              value="name"
                            />

                            <input
                              class="form-control"
                              id="repeater_field_ad8b21cfed852e3793eb0381e8dc745a_6740decfa2633"
                              name="social_links[0][0][value]"
                              type="text"
                              value="Facebook"
                            />
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Icon </label>

                            <input
                              name="social_links[0][1][key]"
                              type="hidden"
                              value="icon"
                            />

                            <select
                              name="social_links[0][1][value]"
                              data-bb-core-icon=""
                              data-url="https://cms.botble.com/admin/core-icons"
                              data-placeholder="Select an option"
                              class="form-control select2-hidden-accessible"
                              id="repeater_field_debb070b0a083e957ede43d47b4f3e00_6740decfa288e"
                              data-select2-id="select2-data-repeater_field_debb070b0a083e957ede43d47b4f3e00_6740decfa288e"
                              tabindex="-1"
                              aria-hidden="true"
                            >
                              <option
                                value="ti ti-brand-facebook"
                                selected=""
                                data-select2-id="select2-data-2-z0mu"
                              >
                                &lt;svg class="icon
                                svg-icon-ti-ti-brand-facebook"
                                xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                &gt; &lt;path stroke="none" d="M0 0h24v24H0z"
                                fill="none"/&gt; &lt;path d="M7
                                10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1
                                -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /&gt;
                                &lt;/svg&gt;
                              </option></select
                            ><span
                              class="select2 select2-container select2-container--default"
                              dir="ltr"
                              data-select2-id="select2-data-1-wfej"
                              style="width: 100%"
                              ><span class="selection"
                                ><span
                                  class="select2-selection select2-selection--single"
                                  role="combobox"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                  tabindex="0"
                                  aria-disabled="false"
                                  aria-labelledby="select2-repeater_field_debb070b0a083e957ede43d47b4f3e00_6740decfa288e-container"
                                  aria-controls="select2-repeater_field_debb070b0a083e957ede43d47b4f3e00_6740decfa288e-container"
                                  ><span
                                    class="select2-selection__rendered"
                                    id="select2-repeater_field_debb070b0a083e957ede43d47b4f3e00_6740decfa288e-container"
                                    role="textbox"
                                    aria-readonly="true"
                                    title='<svg class="icon  svg-icon-ti-ti-brand-facebook"
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
      >
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
    </svg>'
                                    ><span
                                      ><span class="dropdown-item-indicator"
                                        ><svg
                                          class="icon svg-icon-ti-ti-brand-facebook"
                                          xmlns="http://www.w3.org/2000/svg"
                                          width="24"
                                          height="24"
                                          viewBox="0 0 24 24"
                                          fill="none"
                                          stroke="currentColor"
                                          stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                        >
                                          <path
                                            stroke="none"
                                            d="M0 0h24v24H0z"
                                            fill="none"
                                          ></path>
                                          <path
                                            d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"
                                          ></path></svg
                                      ></span>
                                      ti ti-brand-facebook</span
                                    ></span
                                  ><span
                                    class="select2-selection__arrow"
                                    role="presentation"
                                    ><b
                                      role="presentation"
                                    ></b></span></span></span
                              ><span
                                class="dropdown-wrapper"
                                aria-hidden="true"
                              ></span
                            ></span>
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> URL </label>

                            <input
                              name="social_links[0][2][key]"
                              type="hidden"
                              value="url"
                            />

                            <input
                              class="form-control"
                              id="repeater_field_25fb24f781281a9829bbd46228c988e6_6740decfa2b78"
                              name="social_links[0][2][value]"
                              type="text"
                              value="https://facebook.com"
                            />
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label">
                              Icon Image (It will override icon above if set)
                            </label>

                            <input
                              name="social_links[0][3][key]"
                              type="hidden"
                              value="image"
                            />

                            <div
                              class="image-box image-box-social_links[0][3][value]"
                              action="select-image"
                            >
                              <input
                                class="image-data"
                                name="social_links[0][3][value]"
                                type="hidden"
                                value=""
                              />

                              <div
                                style="width: 8rem"
                                class="preview-image-wrapper mb-1"
                              >
                                <div class="preview-image-inner">
                                  <a
                                    data-bb-toggle="image-picker-choose"
                                    data-target="popup"
                                    class="image-box-actions"
                                    data-result="social_links[0][3][value]"
                                    data-action="select-image"
                                    data-allow-thumb="1"
                                    href="#"
                                  >
                                    <img
                                      class="preview-image default-image"
                                      data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                      src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                      alt="Preview image"
                                    />
                                    <span class="image-picker-backdrop"></span>
                                  </a>
                                  <button
                                    class="btn btn-pill btn-icon btn-sm image-picker-remove-button p-0"
                                    style="
                                      display: none;
                                      --bb-btn-font-size: 0.5rem;
                                    "
                                    type="button"
                                    data-bb-toggle="image-picker-remove"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    aria-label="Remove image"
                                    data-bs-original-title="Remove image"
                                  >
                                    <svg
                                      class="icon icon-sm icon-left svg-icon-ti-ti-x"
                                      xmlns="http://www.w3.org/2000/svg"
                                      width="24"
                                      height="24"
                                      viewBox="0 0 24 24"
                                      fill="none"
                                      stroke="currentColor"
                                      stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                    >
                                      <path
                                        stroke="none"
                                        d="M0 0h24v24H0z"
                                        fill="none"
                                      ></path>
                                      <path d="M18 6l-12 12"></path>
                                      <path d="M6 6l12 12"></path>
                                    </svg>
                                  </button>
                                </div>
                              </div>

                              <a
                                data-bb-toggle="image-picker-choose"
                                data-target="popup"
                                data-result="social_links[0][3][value]"
                                data-action="select-image"
                                data-allow-thumb="1"
                                href="#"
                              >
                                Choose image
                              </a>

                              <div data-bb-toggle="upload-from-url">
                                <span class="text-muted">or</span>
                                <a
                                  href="javascript:void(0)"
                                  class="mt-1"
                                  data-bs-toggle="modal"
                                  data-bs-target="#image-picker-add-from-url"
                                  data-bb-target=".image-box-social_links[0][3][value]"
                                >
                                  Add from URL
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Color </label>

                            <input
                              name="social_links[0][4][key]"
                              type="hidden"
                              value="color"
                            />

                            <div class="mb-3 position-relative">
                              <input
                                class="form-control"
                                type="text"
                                name="social_links[0][4][value]"
                                id="repeater_field_432311358e2b4d9b0a06808d64c02855_6740decfa347b"
                                value="transparent"
                                data-bb-color-picker=""
                                default_value="transparent"
                                style="display: none"
                              />
                              <div class="sp-replacer sp-light">
                                <div class="sp-preview">
                                  <div
                                    class="sp-preview-inner"
                                    style="background-color: rgba(0, 0, 0, 0)"
                                  ></div>
                                </div>
                                <div class="sp-dd">▼</div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Background color </label>

                            <input
                              name="social_links[0][5][key]"
                              type="hidden"
                              value="background-color"
                            />

                            <div class="mb-3 position-relative">
                              <input
                                class="form-control"
                                type="text"
                                name="social_links[0][5][value]"
                                id="repeater_field_399f9c32a115c055e16898436770abc3_6740decfa390f"
                                value="transparent"
                                data-bb-color-picker=""
                                default_value="transparent"
                                style="display: none"
                              />
                              <div class="sp-replacer sp-light">
                                <div class="sp-preview">
                                  <div
                                    class="sp-preview-inner"
                                    style="background-color: rgba(0, 0, 0, 0)"
                                  ></div>
                                </div>
                                <div class="sp-dd">▼</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset
                      class="form-fieldset position-relative"
                      data-id="repeater_field_ab30191f59c7d7f95998d9d2dfc936a2_6740decfa758c_1"
                      data-index="1"
                    >
                      <legend
                        class="d-flex justify-content-end align-items-center"
                      >
                        <button
                          class="btn btn-icon btn-sm position-absolute remove-item-button"
                          type="button"
                          data-target="repeater-remove"
                          data-id="repeater_field_ab30191f59c7d7f95998d9d2dfc936a2_6740decfa758c_1"
                        >
                          <svg
                            class="icon icon-sm icon-left svg-icon-ti-ti-x"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path
                              stroke="none"
                              d="M0 0h24v24H0z"
                              fill="none"
                            ></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                          </svg>
                        </button>
                      </legend>

                      <div>
                        <div class="repeater-item-group">
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Name </label>

                            <input
                              name="social_links[1][0][key]"
                              type="hidden"
                              value="name"
                            />

                            <input
                              class="form-control"
                              id="repeater_field_c6edde1183ca100cf0db4d7523337b0c_6740decfa3d1b"
                              name="social_links[1][0][value]"
                              type="text"
                              value="X (Twitter)"
                            />
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Icon </label>

                            <input
                              name="social_links[1][1][key]"
                              type="hidden"
                              value="icon"
                            />

                            <select
                              name="social_links[1][1][value]"
                              data-bb-core-icon=""
                              data-url="https://cms.botble.com/admin/core-icons"
                              data-placeholder="Select an option"
                              class="form-control select2-hidden-accessible"
                              id="repeater_field_131067a746538a9dce2f0496a5adb8cd_6740decfa3ed7"
                              data-select2-id="select2-data-repeater_field_131067a746538a9dce2f0496a5adb8cd_6740decfa3ed7"
                              tabindex="-1"
                              aria-hidden="true"
                            >
                              <option
                                value="ti ti-brand-x"
                                selected=""
                                data-select2-id="select2-data-4-g720"
                              >
                                &lt;svg class="icon svg-icon-ti-ti-brand-x"
                                xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                &gt; &lt;path stroke="none" d="M0 0h24v24H0z"
                                fill="none"/&gt; &lt;path d="M4 4l11.733
                                16h4.267l-11.733 -16z" /&gt; &lt;path d="M4
                                20l6.768 -6.768m2.46 -2.46l6.772 -6.772" /&gt;
                                &lt;/svg&gt;
                              </option></select
                            ><span
                              class="select2 select2-container select2-container--default"
                              dir="ltr"
                              data-select2-id="select2-data-3-96x6"
                              style="width: 100%"
                              ><span class="selection"
                                ><span
                                  class="select2-selection select2-selection--single"
                                  role="combobox"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                  tabindex="0"
                                  aria-disabled="false"
                                  aria-labelledby="select2-repeater_field_131067a746538a9dce2f0496a5adb8cd_6740decfa3ed7-container"
                                  aria-controls="select2-repeater_field_131067a746538a9dce2f0496a5adb8cd_6740decfa3ed7-container"
                                  ><span
                                    class="select2-selection__rendered"
                                    id="select2-repeater_field_131067a746538a9dce2f0496a5adb8cd_6740decfa3ed7-container"
                                    role="textbox"
                                    aria-readonly="true"
                                    title='<svg class="icon  svg-icon-ti-ti-brand-x"
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
      >
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
      <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
    </svg>'
                                    ><span
                                      ><span class="dropdown-item-indicator"
                                        ><svg
                                          class="icon svg-icon-ti-ti-brand-x"
                                          xmlns="http://www.w3.org/2000/svg"
                                          width="24"
                                          height="24"
                                          viewBox="0 0 24 24"
                                          fill="none"
                                          stroke="currentColor"
                                          stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                        >
                                          <path
                                            stroke="none"
                                            d="M0 0h24v24H0z"
                                            fill="none"
                                          ></path>
                                          <path
                                            d="M4 4l11.733 16h4.267l-11.733 -16z"
                                          ></path>
                                          <path
                                            d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"
                                          ></path></svg
                                      ></span>
                                      ti ti-brand-x</span
                                    ></span
                                  ><span
                                    class="select2-selection__arrow"
                                    role="presentation"
                                    ><b
                                      role="presentation"
                                    ></b></span></span></span
                              ><span
                                class="dropdown-wrapper"
                                aria-hidden="true"
                              ></span
                            ></span>
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> URL </label>

                            <input
                              name="social_links[1][2][key]"
                              type="hidden"
                              value="url"
                            />

                            <input
                              class="form-control"
                              id="repeater_field_c14e1bffc38f89d71ae258f54e905191_6740decfa4156"
                              name="social_links[1][2][value]"
                              type="text"
                              value="https://x.com"
                            />
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label">
                              Icon Image (It will override icon above if set)
                            </label>

                            <input
                              name="social_links[1][3][key]"
                              type="hidden"
                              value="image"
                            />

                            <div
                              class="image-box image-box-social_links[1][3][value]"
                              action="select-image"
                            >
                              <input
                                class="image-data"
                                name="social_links[1][3][value]"
                                type="hidden"
                                value=""
                              />

                              <div
                                style="width: 8rem"
                                class="preview-image-wrapper mb-1"
                              >
                                <div class="preview-image-inner">
                                  <a
                                    data-bb-toggle="image-picker-choose"
                                    data-target="popup"
                                    class="image-box-actions"
                                    data-result="social_links[1][3][value]"
                                    data-action="select-image"
                                    data-allow-thumb="1"
                                    href="#"
                                  >
                                    <img
                                      class="preview-image default-image"
                                      data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                      src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                      alt="Preview image"
                                    />
                                    <span class="image-picker-backdrop"></span>
                                  </a>
                                  <button
                                    class="btn btn-pill btn-icon btn-sm image-picker-remove-button p-0"
                                    style="
                                      display: none;
                                      --bb-btn-font-size: 0.5rem;
                                    "
                                    type="button"
                                    data-bb-toggle="image-picker-remove"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    aria-label="Remove image"
                                    data-bs-original-title="Remove image"
                                  >
                                    <svg
                                      class="icon icon-sm icon-left svg-icon-ti-ti-x"
                                      xmlns="http://www.w3.org/2000/svg"
                                      width="24"
                                      height="24"
                                      viewBox="0 0 24 24"
                                      fill="none"
                                      stroke="currentColor"
                                      stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                    >
                                      <path
                                        stroke="none"
                                        d="M0 0h24v24H0z"
                                        fill="none"
                                      ></path>
                                      <path d="M18 6l-12 12"></path>
                                      <path d="M6 6l12 12"></path>
                                    </svg>
                                  </button>
                                </div>
                              </div>

                              <a
                                data-bb-toggle="image-picker-choose"
                                data-target="popup"
                                data-result="social_links[1][3][value]"
                                data-action="select-image"
                                data-allow-thumb="1"
                                href="#"
                              >
                                Choose image
                              </a>

                              <div data-bb-toggle="upload-from-url">
                                <span class="text-muted">or</span>
                                <a
                                  href="javascript:void(0)"
                                  class="mt-1"
                                  data-bs-toggle="modal"
                                  data-bs-target="#image-picker-add-from-url"
                                  data-bb-target=".image-box-social_links[1][3][value]"
                                >
                                  Add from URL
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Color </label>

                            <input
                              name="social_links[1][4][key]"
                              type="hidden"
                              value="color"
                            />

                            <div class="mb-3 position-relative">
                              <input
                                class="form-control"
                                type="text"
                                name="social_links[1][4][value]"
                                id="repeater_field_e03fe4738841becb2eb756f83834885e_6740decfa4757"
                                value="transparent"
                                data-bb-color-picker=""
                                default_value="transparent"
                                style="display: none"
                              />
                              <div class="sp-replacer sp-light">
                                <div class="sp-preview">
                                  <div
                                    class="sp-preview-inner"
                                    style="background-color: rgba(0, 0, 0, 0)"
                                  ></div>
                                </div>
                                <div class="sp-dd">▼</div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Background color </label>

                            <input
                              name="social_links[1][5][key]"
                              type="hidden"
                              value="background-color"
                            />

                            <div class="mb-3 position-relative">
                              <input
                                class="form-control"
                                type="text"
                                name="social_links[1][5][value]"
                                id="repeater_field_79e0ada6e94c191263b6a1deb937fdcc_6740decfa4af9"
                                value="transparent"
                                data-bb-color-picker=""
                                default_value="transparent"
                                style="display: none"
                              />
                              <div class="sp-replacer sp-light">
                                <div class="sp-preview">
                                  <div
                                    class="sp-preview-inner"
                                    style="background-color: rgba(0, 0, 0, 0)"
                                  ></div>
                                </div>
                                <div class="sp-dd">▼</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <fieldset
                      class="form-fieldset position-relative"
                      data-id="repeater_field_ab30191f59c7d7f95998d9d2dfc936a2_6740decfa758c_2"
                      data-index="2"
                    >
                      <legend
                        class="d-flex justify-content-end align-items-center"
                      >
                        <button
                          class="btn btn-icon btn-sm position-absolute remove-item-button"
                          type="button"
                          data-target="repeater-remove"
                          data-id="repeater_field_ab30191f59c7d7f95998d9d2dfc936a2_6740decfa758c_2"
                        >
                          <svg
                            class="icon icon-sm icon-left svg-icon-ti-ti-x"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path
                              stroke="none"
                              d="M0 0h24v24H0z"
                              fill="none"
                            ></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                          </svg>
                        </button>
                      </legend>

                      <div>
                        <div class="repeater-item-group">
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Name </label>

                            <input
                              name="social_links[2][0][key]"
                              type="hidden"
                              value="name"
                            />

                            <input
                              class="form-control"
                              id="repeater_field_1b12f462fd29dd47b9d4a79b1a291651_6740decfa4f10"
                              name="social_links[2][0][value]"
                              type="text"
                              value="YouTube"
                            />
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Icon </label>

                            <input
                              name="social_links[2][1][key]"
                              type="hidden"
                              value="icon"
                            />

                            <select
                              name="social_links[2][1][value]"
                              data-bb-core-icon=""
                              data-url="https://cms.botble.com/admin/core-icons"
                              data-placeholder="Select an option"
                              class="form-control select2-hidden-accessible"
                              id="repeater_field_8a7111b2ac6bee6a790c291a8aa43178_6740decfa5098"
                              data-select2-id="select2-data-repeater_field_8a7111b2ac6bee6a790c291a8aa43178_6740decfa5098"
                              tabindex="-1"
                              aria-hidden="true"
                            >
                              <option
                                value="ti ti-brand-youtube"
                                selected=""
                                data-select2-id="select2-data-6-w27o"
                              >
                                &lt;svg class="icon
                                svg-icon-ti-ti-brand-youtube"
                                xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                &gt; &lt;path stroke="none" d="M0 0h24v24H0z"
                                fill="none"/&gt; &lt;path d="M2 8a4 4 0 0 1 4
                                -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0
                                1 -4 -4v-8z" /&gt; &lt;path d="M10 9l5 3l-5 3z"
                                /&gt; &lt;/svg&gt;
                              </option></select
                            ><span
                              class="select2 select2-container select2-container--default"
                              dir="ltr"
                              data-select2-id="select2-data-5-rg9w"
                              style="width: 100%"
                              ><span class="selection"
                                ><span
                                  class="select2-selection select2-selection--single"
                                  role="combobox"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                  tabindex="0"
                                  aria-disabled="false"
                                  aria-labelledby="select2-repeater_field_8a7111b2ac6bee6a790c291a8aa43178_6740decfa5098-container"
                                  aria-controls="select2-repeater_field_8a7111b2ac6bee6a790c291a8aa43178_6740decfa5098-container"
                                  ><span
                                    class="select2-selection__rendered"
                                    id="select2-repeater_field_8a7111b2ac6bee6a790c291a8aa43178_6740decfa5098-container"
                                    role="textbox"
                                    aria-readonly="true"
                                    title='<svg class="icon  svg-icon-ti-ti-brand-youtube"
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      stroke-linecap="round"
      stroke-linejoin="round"
      >
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
      <path d="M10 9l5 3l-5 3z" />
    </svg>'
                                    ><span
                                      ><span class="dropdown-item-indicator"
                                        ><svg
                                          class="icon svg-icon-ti-ti-brand-youtube"
                                          xmlns="http://www.w3.org/2000/svg"
                                          width="24"
                                          height="24"
                                          viewBox="0 0 24 24"
                                          fill="none"
                                          stroke="currentColor"
                                          stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                        >
                                          <path
                                            stroke="none"
                                            d="M0 0h24v24H0z"
                                            fill="none"
                                          ></path>
                                          <path
                                            d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z"
                                          ></path>
                                          <path d="M10 9l5 3l-5 3z"></path></svg
                                      ></span>
                                      ti ti-brand-youtube</span
                                    ></span
                                  ><span
                                    class="select2-selection__arrow"
                                    role="presentation"
                                    ><b
                                      role="presentation"
                                    ></b></span></span></span
                              ><span
                                class="dropdown-wrapper"
                                aria-hidden="true"
                              ></span
                            ></span>
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> URL </label>

                            <input
                              name="social_links[2][2][key]"
                              type="hidden"
                              value="url"
                            />

                            <input
                              class="form-control"
                              id="repeater_field_1567a5221741e61b9eac9f43e1facd69_6740decfa5568"
                              name="social_links[2][2][value]"
                              type="text"
                              value="https://youtube.com"
                            />
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label">
                              Icon Image (It will override icon above if set)
                            </label>

                            <input
                              name="social_links[2][3][key]"
                              type="hidden"
                              value="image"
                            />

                            <div
                              class="image-box image-box-social_links[2][3][value]"
                              action="select-image"
                            >
                              <input
                                class="image-data"
                                name="social_links[2][3][value]"
                                type="hidden"
                                value=""
                              />

                              <div
                                style="width: 8rem"
                                class="preview-image-wrapper mb-1"
                              >
                                <div class="preview-image-inner">
                                  <a
                                    data-bb-toggle="image-picker-choose"
                                    data-target="popup"
                                    class="image-box-actions"
                                    data-result="social_links[2][3][value]"
                                    data-action="select-image"
                                    data-allow-thumb="1"
                                    href="#"
                                  >
                                    <img
                                      class="preview-image default-image"
                                      data-default="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                      src="https://cms.botble.com/vendor/core/core/base/images/placeholder.png"
                                      alt="Preview image"
                                    />
                                    <span class="image-picker-backdrop"></span>
                                  </a>
                                  <button
                                    class="btn btn-pill btn-icon btn-sm image-picker-remove-button p-0"
                                    style="
                                      display: none;
                                      --bb-btn-font-size: 0.5rem;
                                    "
                                    type="button"
                                    data-bb-toggle="image-picker-remove"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    aria-label="Remove image"
                                    data-bs-original-title="Remove image"
                                  >
                                    <svg
                                      class="icon icon-sm icon-left svg-icon-ti-ti-x"
                                      xmlns="http://www.w3.org/2000/svg"
                                      width="24"
                                      height="24"
                                      viewBox="0 0 24 24"
                                      fill="none"
                                      stroke="currentColor"
                                      stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                    >
                                      <path
                                        stroke="none"
                                        d="M0 0h24v24H0z"
                                        fill="none"
                                      ></path>
                                      <path d="M18 6l-12 12"></path>
                                      <path d="M6 6l12 12"></path>
                                    </svg>
                                  </button>
                                </div>
                              </div>

                              <a
                                data-bb-toggle="image-picker-choose"
                                data-target="popup"
                                data-result="social_links[2][3][value]"
                                data-action="select-image"
                                data-allow-thumb="1"
                                href="#"
                              >
                                Choose image
                              </a>

                              <div data-bb-toggle="upload-from-url">
                                <span class="text-muted">or</span>
                                <a
                                  href="javascript:void(0)"
                                  class="mt-1"
                                  data-bs-toggle="modal"
                                  data-bs-target="#image-picker-add-from-url"
                                  data-bb-target=".image-box-social_links[2][3][value]"
                                >
                                  Add from URL
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Color </label>

                            <input
                              name="social_links[2][4][key]"
                              type="hidden"
                              value="color"
                            />

                            <div class="mb-3 position-relative">
                              <input
                                class="form-control"
                                type="text"
                                name="social_links[2][4][value]"
                                id="repeater_field_e4dae23d1416be0a8bfb795b492c50f4_6740decfa5ddc"
                                value="transparent"
                                data-bb-color-picker=""
                                default_value="transparent"
                                style="display: none"
                              />
                              <div class="sp-replacer sp-light">
                                <div class="sp-preview">
                                  <div
                                    class="sp-preview-inner"
                                    style="background-color: rgba(0, 0, 0, 0)"
                                  ></div>
                                </div>
                                <div class="sp-dd">▼</div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 position-relative">
                            <label class="form-label"> Background color </label>

                            <input
                              name="social_links[2][5][key]"
                              type="hidden"
                              value="background-color"
                            />

                            <div class="mb-3 position-relative">
                              <input
                                class="form-control"
                                type="text"
                                name="social_links[2][5][value]"
                                id="repeater_field_27555e5fc09c90534275d7dd57eb063b_6740decfa62e7"
                                value="transparent"
                                data-bb-color-picker=""
                                default_value="transparent"
                                style="display: none"
                              />
                              <div class="sp-replacer sp-light">
                                <div class="sp-preview">
                                  <div
                                    class="sp-preview-inner"
                                    style="background-color: rgba(0, 0, 0, 0)"
                                  ></div>
                                </div>
                                <div class="sp-dd">▼</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </div>

                  <div class="mb-3">
                    <button
                      class="btn"
                      type="button"
                      data-target="repeater-add"
                      data-id="repeater_field_ab30191f59c7d7f95998d9d2dfc936a2_6740decfa758c"
                    >
                      Add new
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endpush @push('scripts')
<!-- Include Pickr CSS -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"
/>
<!-- Include Pickr JS -->
<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr"></script>
<script>
  const pickrWithPalette = Pickr.create({
    el: "#colorPicker",
    theme: "classic",
    default: "#3498db",
    swatches: [
      "#1abc9c",
      "#2ecc71",
      "#3498db",
      "#9b59b6",
      "#34495e",
      "#16a085",
      "#27ae60",
      "#2980b9",
      "#8e44ad",
      "#2c3e50",
    ],
    components: {
      preview: true,
      opacity: false,
      hue: true,
      interaction: {
        hex: true,
        input: true,
        save: true,
      },
    },
  });

  // Save the selected color
  pickrWithPalette.on("save", (color) => {
    const colorHex = color.toHEXA().toString();
    alert(`Color saved: ${colorHex}`);
  });

  function previewSelectedImage(input) {
    const file = input.files[0];
    const previewId = input.dataset.preview;
    const previewImage = document.getElementById(previewId);
    const removeButton = document.querySelector(
      `[data-remove-button][data-target-preview="${previewId}"]`,
    );
    const reader = new FileReader();

    if (file) {
      reader.onload = function (e) {
        previewImage.src = e.target.result;
        removeButton.classList.remove("d-none");
      };
      reader.onerror = function () {
        console.error("Error reading the file. Please try again.");
      };
      reader.readAsDataURL(file);
    } else {
      console.warn("No file selected.");
    }
  }

  // Event delegation for removing the selected image
  document.addEventListener("click", function (e) {
    if (e.target.matches("[data-remove-button]")) {
      const previewId = e.target.dataset.targetPreview;
      const inputId = e.target.dataset.targetInput;
      const previewImage = document.getElementById(previewId);
      const fileInput = document.getElementById(inputId);
      const defaultImage = previewImage.dataset.default || "";
      previewImage.src = defaultImage;
      e.target.classList.add("d-none");
      fileInput.value = "";
    }
  });
</script>

@endpush
