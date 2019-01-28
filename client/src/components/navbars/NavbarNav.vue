<template>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-navbar">
        <header class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#top-header">
                <span class="navbar-toggler-icon"></span>
            </button>

            <section class="collapse navbar-collapse" id="top-header">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">
                            {{ $t('copyright.companyName') }}
                        </router-link>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <router-link to="/" class="nav-link">
                            <span class="fa fa-home fa-fw"></span> {{ $t('menu.home') }}
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/production" class="nav-link">
                            <span class="fa fa-tasks fa-fw"></span> {{ $t('menu.production') }}
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/packaging" class="nav-link">
                            <span class="fa fa-archive fa-fw"></span> {{ $t('menu.packaging') }}
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/receiving" class="nav-link">
                            <span class="fa fa-exchange fa-fw"></span> {{ $t('menu.receiving') }}
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/warehouse" class="nav-link">
                            <span class="fa fa-building-o fa-fw"></span> {{ $t('menu.warehouse') }}
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#search_modal">
                            <span class="fa fa-archive fa-fw"></span> {{ $t('menu.binSearch') }}
                        </a>
                    </li>

                </ul>

            </section>
        </header>
    </nav>
</template>

<script>
  export default {
    name: "NavbarNav"
  }
</script>

<style scoped>
.bg-navbar {
  background-color: #1c60a5;
}
</style>
