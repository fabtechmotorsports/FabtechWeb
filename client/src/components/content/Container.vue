<template>
    <main class="container" id="container">
        <section class="row">
            <div class="col">
                <router-view/>
            </div>
        </section>
    </main>
</template>

<script>
  export default {
    name: "Container",
    // Upon component creation, log to the console
    created() {
      console.log('Application has successfully loaded the main content container.');
    }
  }
</script>
