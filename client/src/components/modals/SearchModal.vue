<template>
    <section class="modal animated fadeInDownBig" id="search_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-deepocean text-white">
                    <h4 class="modal-title">
                        <span class="fa fa-search fa-fw"></span> {{ $t('menu.binSearch') }}
                    </h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-justify">
                    <nav>

                        <div class="nav nav-tabs" id="nav-tab" role="tablist">


                            <a class="nav-item nav-link active" id="receiving-labels-tab" data-toggle="tab" href="#receiving-labels"
                               role="tab" aria-controls="receiving-labels" aria-selected="true">
                                <span class="fa fa-arrow-down fa-fw"></span> Receiving
                            </a>


                            <a class="nav-item nav-link" id="issuing-labels-tab" data-toggle="tab" href="#issuing-labels"
                               role="tab" aria-controls="issuing-labels" aria-selected="false">
                                <span class="fa fa-arrow-up fa-fw"></span> Issuing
                            </a>


                        </div>

                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="receiving-labels" role="tabpanel"
                             aria-labelledby="receiving-labels-tab">
                            <!-- -->
                            <div class="alert alert-info">
                                <span class="fa fa-info-circle fa-fw"></span> Nothing to see yet!
                            </div>
                        </div>



                        <div class="tab-pane fade" id="issuing-labels" role="tabpanel"
                             aria-labelledby="issuing-labels-tab">
                            <!-- -->
                            <div class="alert alert-info">
                                <span class="fa fa-info-circle fa-fw"></span> Nothing to see yet!
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-clouds">
                    <div class="btn-group">
                        <button type="button" class="btn bg-primary text-white" data-dismiss="modal">
                            <span class="fa fa-times fa-fw"></span> {{ $t('application.closeWindow') }}
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
  export default {
    name:    "SearchModal",
    data() {
      return {
        // ...
      }
    }
  }
</script>
