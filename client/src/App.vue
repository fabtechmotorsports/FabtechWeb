<template>
    <main id="app">

        <!-- Navbar/Header -->
        <navbar-nav></navbar-nav>

        <!-- Main Content -->
        <main-container></main-container>

        <!-- Footer -->
        <footer-nav></footer-nav>

        <!-- The License Modal -->
        <license-modal></license-modal>

        <!-- Live Search Model -->
        <search-modal></search-modal>

        <!-- Label Generator Model -->
        <label-generator></label-generator>

    </main>
</template>

<script>
  import LicenseModal   from './components/modals/LicenseModal.vue';
  import SearchModal    from './components/modals/SearchModal.vue';
  import Container      from './components/content/Container.vue';
  import FooterNav      from './components/navbars/FooterNav.vue';
  import NavbarNav      from './components/navbars/NavbarNav.vue';
  import LabelGenerator from "./components/labels/LabelGenerator.vue";

  export default {
    head: {
      title: {
        inner: 'Fabtech',
        separator: ' ',
        complement: 'Motorsports'
      }
    },
    components: {
      // Components
      "main-container": Container,
      "navbar-nav": NavbarNav,
      "footer-nav": FooterNav,

      // Modal Popups
      "license-modal": LicenseModal,
      "search-modal": SearchModal,
      "label-generator": LabelGenerator,
    }
  };
</script>

<style>
    @import url("assets/css/app.css");
    body {
        background-color: #e5e5e5 !important;
        }
    @media print {
        .no-print {
            display: none !important;
            }
        }
    #container {
        background-color: #fff;
        padding-bottom: 25px !important;
        padding-top: 75px;
        }
    #app {
        font-family: "Raleway", Helvetica, Arial, sans-serif !important;
        -webkit-font-smoothing:  antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: #2c3e50;
        }
    .nav-tabs {
        border-bottom: 1px solid #c0d1d2 !important;
        }
    .tab-content {
        padding:       10px !important;
        border-left:   1px solid #c0d1d2 !important;
        border-right:  1px solid #c0d1d2 !important;
        border-bottom: 1px solid #c0d1d2 !important;
        }
</style>
