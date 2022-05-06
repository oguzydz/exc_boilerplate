<template>
  <app-layout>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            {{ pluralText(name) }}
          </div>
          <div class="card-body">
            <el-table :data="data.data" class="w-full">
              <el-table-column prop="id" label="#" width="45"></el-table-column>
              <el-table-column label="Görsel" width="120">
                <template #default="scope">
                  <img
                    :src="`https://ui-avatars.com/api/?name=${scope.row.name}&color=7F9CF5&background=EBF4FF`"
                    class="w-50"
                    @error="imageUrlAlt"
                  />
                </template>
              </el-table-column>
              <el-table-column label="Adı" prop="name"></el-table-column>
              <el-table-column label="E-posta" prop="email"></el-table-column>
              <el-table-column label="Güncelleme Tarihi">
                <template #default="scope">
                  {{ $moment(scope.row.updated_at).subtract(-3, 'hours').fromNow() }}
                </template>
              </el-table-column>
              <el-table-column label="Oluşturulma Tarihi">
                <template #default="scope">
                  {{ $moment(scope.row.created_at).subtract(-3, 'hours').fromNow() }}
                </template>
              </el-table-column>
              <el-table-column label="Seçenekler" align="right">
                <template #default="scope">
                  <el-button
                    type="primary"
                    icon="el-icon-edit"
                    size="mini"
                    @click="
                      $inertia.get(route(`${routeName}.edit`, [scope.row.id]))
                    "
                  ></el-button>
                  <el-button
                    type="warning"
                    size="mini"
                    @click="
                      $inertia.get(route(`${routeName}.edit`, [scope.row.id]))
                    "
                  >
                    <i class="fad fa-truck"></i>
                  </el-button>

                  <el-button
                    type="danger"
                    icon="el-icon-delete"
                    size="mini"
                    @click="confirmDelete(scope.row.id, routeName)"
                  ></el-button>
                </template>
              </el-table-column>
            </el-table>
            <el-pagination
              background
              class="float-right my-6"
              layout="prev, pager, next"
              @current-change="
                (page) => handlePagination(page, `${routeName}.index`)
              "
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
import AppLayout from '@/Layouts/AppAdminLayout'

export default {
  components: {
    AppLayout,
  },

  props: {
    data: {},
  },

  data() {
    return {
      routeName: 'admin.customer',
      name: 'Müşteri',
    }
  },

  mounted() {

},
}
</script>
