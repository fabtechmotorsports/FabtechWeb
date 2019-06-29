<template>
    <section class="modal animated fadeInDownBig" id="label_generator">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-deepocean text-white">
                    <h4 class="modal-title">
                        <span class="fa fa-barcode fa-fw"></span> Label Generator
                    </h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-justify">

                    <nav>

                        <div class="nav nav-tabs" id="nav-tab" role="tablist">


                            <a class="nav-item nav-link active" id="op-labels-tab" data-toggle="tab" href="#op-labels"
                               role="tab" aria-controls="op-labels" aria-selected="true">
                                <span class="fa fa-tasks fa-fw"></span> OP
                            </a>


                            <a class="nav-item nav-link" id="bin-labels-tab" data-toggle="tab" href="#bin-labels"
                               role="tab" aria-controls="bin-labels" aria-selected="false">
                                <span class="fa fa-archive fa-fw"></span> Bins
                            </a>


                        </div>

                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="op-labels" role="tabpanel"
                             aria-labelledby="op-labels-tab">
                            <!-- -->
                            <div class="alert alert-info">
                                <span class="fa fa-info-circle fa-fw"></span> Nothing to see yet!
                            </div>
                        </div>



                        <div class="tab-pane fade" id="bin-labels" role="tabpanel" aria-labelledby="bin-labels-tab">
                            <!-- -->
                            <label for="op_input">
                                <input class="form-control form-control-lg" v-model="binBarcodeValue" v-on:keyup="generateBinBarcode" id="op_input" name="op_input"/>
                            </label>
                            <section class="text-center" id="printBinLabel">
                                <div class="">
                                    <svg id="binBarcode"></svg>
                                </div>

                                <h1 style="" v-if="binBarcodeValue !== null">
                                    {{ binBarcodeValue }}
                                </h1>

                            </section>
                            <section>
                                <!-- -->
                                <button type="button" class="no-print btn bg-success btn-block text-white"  v-on:click="printBinLabel">
                                    <span class="fa fa-print fa-fw"></span> {{ $t('application.printData') }}
                                </button>
                            </section>
                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-clouds">

                    <!-- -->
                    <div class="btn-group">

                        <!-- -->
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
  import JsBarcode from 'jsbarcode'
  export default {
    name: "LabelGenerator",
    data() {
      return {
        binBarcodeValue: null,
        opBarcodeValue: null,
        output: null
      }
    },
    methods: {
      generateBinBarcode() {
        JsBarcode('#binBarcode', this.binBarcodeValue, {
          format: "code39",
          displayValue: false
        });
      },
      generateOpBarcode() {
        JsBarcode('#opBarcode', this.binBarcodeValue, {
          format: "code39",
          displayValue: false
        });
      },
      printBinLabel() {
        // Pass the element id here
        this.$htmlToPaper('printBinLabel');
      },
      printOpLabel() {
        // Pass the element id here
        this.$htmlToPaper('printOpLabel');
      }
    }
  }
</script>

<style scoped>
    @media print {
        #printLabel {
            text-align: center !important;
        }}
</style>
