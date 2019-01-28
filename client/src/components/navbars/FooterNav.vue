<template>
    <footer class="navbar navbar-expand-lg fixed-bottom bg-dark navbar-dark">
        <section class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bottom-footer">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="bottom-footer">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#license_modal">
                            <span class="fa fa-copyright fa-fw"></span>
                            {{ moment().format('YYYY') }} - {{ $t('licensing.licenseInfo') }}
                        </a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#label_generator">
                            <span class="fa fa-barcode fa-fw"></span> Label Generator
                        </a>
                    </li>

                </ul>
            </div>
        </section>
    </footer>
</template>

<script>
  export default {
    name: "FooterNav",
  }
</script>
