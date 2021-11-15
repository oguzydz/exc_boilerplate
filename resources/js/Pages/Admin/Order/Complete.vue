<template>
  <app-layout>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <el-button
              type="primary"
              class="mr-2"
              icon="el-icon-back"
              @click="$inertia.get(route('admin.order.show', [data.id]))"
              size="mini"
            >
              Siparişe Dön
            </el-button>
            Siparişi Tamamla #{{ data.id }}
          </div>
          <div class="card-body">
            <form>
              <div class="form-group mb-2">
                <label>Link(Opsiyonel)</label>
                <el-input
                  placeholder="wetransfer maybe"
                  v-model="form.file_link"
                ></el-input>
              </div>
              <div class="form-group mb-2">
                <label>Açıklama</label>
                <vue-editor
                  v-model="form.text"
                ></vue-editor>
              </div>
              <button
                class="btn btn-success text-white float-right mt-2"
                @click="create(form)"
                type="button"
              >
                Kaydet
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppAdminLayout";

import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import { VueEditor } from "vue3-editor";

const FilePond = vueFilePond();

export default {
  components: {
    AppLayout,
    FilePond,
    VueEditor,
  },
  props: {
    data: {},
    orderResult: {},
    errors: {},
  },
  data() {
    return {
      form: {
        order_id: this.data.id,
        file_link: this.orderResult ? this.orderResult.file_link : '',
        text: this.orderResult ? this.orderResult.text : '',
      },
    };
  },

  methods: {
    onAddFile(error, file) {
      if (error) {
        this.$message({
          type: "error",
          dangerouslyUseHTMLString: true,
          message:
            "Görsel Eklenirken bir hata ile karşılaşıldı. Tekrar Deneyiniz!",
        });
      }

      this.form.image = file.source;
    },

    create(data) {
      data._method = "POST";
      this.$inertia.post(route("admin.order.complete"), data, {
        onSuccess: (page) => {
          this.$message({
            type: "success",
            message: "İşlem başarıyla tamamlandı.",
          });
          this.$inertia.get(route("admin.order.show", this.data.id));
        },
        onError: (errors) => {
          this.$message({
            type: "error",
            dangerouslyUseHTMLString: true,
            message:
              "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
              this.errorsToMessage(errors),
          });
        },
      });
    },
  },
};
</script>
