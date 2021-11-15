<template>
  <app-layout>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <el-button
              type="success"
              class="float-right ml-2"
              icon="el-icon-arrow-left"
              v-on:click="$inertia.get(route('admin.product.index'))"
              size="mini"
            >
              Geri
            </el-button>
            Ürün Özellikleri
            <el-button
              type="success"
              class="float-right"
              icon="el-icon-plus"
              v-on:click="
                $inertia.get(
                  route('admin.product.feature.create', { id: product.id })
                )
              "
              size="mini"
            >
              Özellik Ekle
            </el-button>
          </div>
          <div class="card-body">
            <el-table :data="data.data" style="width: 100%">
              <el-table-column prop="id" label="#" width="45"></el-table-column>
              <el-table-column prop="title" label="Başlık"></el-table-column>
              <el-table-column prop="text" label="Açıklama"></el-table-column>
              <el-table-column label="Options" width="200">
                <template #default="scope">
                  <el-button
                    type="primary"
                    icon="el-icon-edit"
                    size="mini"
                    v-on:click="
                      $inertia.get(
                        route('admin.product.feature.edit', {
                          productId: product.id,
                          featureId: scope.row.id,
                        })
                      )
                    "
                  >
                  </el-button>
                  <el-button
                    type="danger"
                    icon="el-icon-delete"
                    size="mini"
                    v-on:click="confirmDelete(product.id, scope.row.id)"
                  ></el-button>
                </template>
              </el-table-column>
            </el-table>
            <el-pagination
              background
              class="float-right my-6"
              layout="prev, pager, next"
              @current-change="handlePagination"
              :current-page="data.current_page"
              :page-size="data.per_page"
              :total="data.total"
            ></el-pagination>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppAdminLayout";

export default {
  components: {
    AppLayout,
  },

  props: {
    data: {},
    product: {},
  },

  mounted() {
    console.log(this.product);
  },

  methods: {
    confirmDelete(productId, featureId) {
      this.$confirm(
        "Bu ürünü silmek üzeresiniz, devam edecek misiniz?",
        "Uyarı",
        {
          confirmButtonText: "OK",
          cancelButtonText: "İptal",
          type: "warning",
        }
      )
        .then(() => {
          this.$inertia.post(
            route("admin.product.feature.destroy", {
              productId: productId,
              featureId: featureId,
            }),
            {},
            {
              onSuccess: (page) => {
                this.$message({
                  type: "success",
                  message: "İşlem başarıyla tamamlandı.",
                });
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
            }
          );
        })
        .catch((e) => {
          console.log(e);
          this.$message({
            type: "info",
            message: "Silme İptal Edildi!",
          });
        });
    },
    handlePagination(page) {
      const url = this.route("admin.product.feature.index", {
        productId: this.product.id,
        featureId: this.product.featureId,
        page: page,
      });
      this.$inertia.get(url)
    },
    errorsToMessage(errors) {
      let $errorBag = [];
      Object.keys(errors).map(function (value, key) {
        $errorBag += errors[value] + "<br>";
      });

      return $errorBag;
    },
  },
};
</script>
