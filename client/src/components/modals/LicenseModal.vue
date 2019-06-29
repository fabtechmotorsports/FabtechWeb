<template>
  <section class="modal animated fadeInDownBig" id="license_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header bg-deepocean text-white">
          <h4 class="modal-title">
            <span class="fa fa-info-circle fa-fw"></span>
            {{ $t("licensing.licenseInfo") }}
          </h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-justify">
          <div>
            <p>
              <em>
                Note: This license has also been called the "Simplified BSD
                License" and the "FreeBSD License". See also the
                <a
                  href="https://opensource.org/licenses/BSD-3-Clause"
                  target="_blank"
                >
                  3-clause BSD License
                </a>
              </em>
            </p>
          </div>

          <table class="table table-bordered table-condensed">
            <thead class="bg-dark text-light text-center">
              <th>Copyright Years</th>
              <th>Company Name</th>
              <th>Copyright Holder</th>
            </thead>
            <tbody class="text-center">
              <tr>
                <td>2016 - {{ moment().format("YYYY") }}</td>
                <td>{{ $t("copyright.companyName") }}</td>
                <td>{{ $t("copyright.copyrightHolder") }}</td>
              </tr>
            </tbody>
          </table>

          <div class="card card-body">
            <p>
              Redistribution and use in source and binary forms, with or without
              modification, are permitted provided that the following conditions
              are met:
            </p>

            <ol>
              <li>
                Redistributions of source code must retain the above copyright
                notice, this list of conditions and the following disclaimer
              </li>
              <li>
                Redistributions in binary form must reproduce the above
                copyright notice, this list of conditions and the following
                disclaimer in the documentation and/or other materials provided
                with the distribution
              </li>
            </ol>
            <p>
              {{ $t("copyright.disclaimer") }}
            </p>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer bg-clouds">
          <div class="btn-group">
            <a
              class="btn bg-dark text-clouds btn-xs"
              href="https://github.com/jason-napolitano/FabtechWeb/tree/master/client"
              target="_blank"
            >
              <span class="fa fa-github fa-fw"></span> Github Project
            </a>
            <button
              type="button"
              class="btn bg-primary text-white"
              data-dismiss="modal"
            >
              <span class="fa fa-times fa-fw"></span>
              {{ $t("application.closeWindow") }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "LicenseModal"
};
</script>
