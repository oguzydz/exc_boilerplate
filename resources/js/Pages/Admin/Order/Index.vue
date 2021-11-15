<template>
  <app-layout>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <el-button
              type="primary"
              class="mr-2 float-right"
              icon="el-icon-back"
              @click="$inertia.get(route('admin.order.index'))"
              size="mini"
            >
              Yeni
            </el-button>

            <el-button
              type="primary"
              class="mx-2 float-right"
              icon="el-icon-back"
              @click="$inertia.get(route('admin.order.index', [1]))"
              size="mini"
            >
              Ödendi
            </el-button>

            <el-button
              type="primary"
              class="mx-2 float-right"
              icon="el-icon-back"
              @click="$inertia.get(route('admin.order.index', [2]))"
              size="mini"
            >
              İşleme Alınan
            </el-button>

            <el-button
              type="primary"
              class="mx-2 float-right"
              icon="el-icon-back"
              @click="$inertia.get(route('admin.order.index', [3]))"
              size="mini"
            >
              Tamamlandı
            </el-button>

            <el-button
              type="primary"
              class="mx-2 float-right"
              icon="el-icon-back"
              @click="$inertia.get(route('admin.order.index', [4]))"
              size="mini"
            >
              İptal Edildi
            </el-button>

            {{ pluralText(name) }}
          </div>
          <div class="card-body">
            <el-table :data="data.data" class="w-full">
              <el-table-column prop="id" label="#" width="45"></el-table-column>
              <el-table-column prop="user.name" label="Kullanıcı"></el-table-column>
              <el-table-column label="Durum">
                <template #default="scope">
                    {{ orderStatus(scope.row.status).title }}
                </template>
              </el-table-column>
              <el-table-column label="Oluşturulma Zamanı">
                <template #default="scope">
                  {{ $moment(scope.row.created_at).format('DD-MM-Y H:s') }}
                </template>
              </el-table-column>
              <el-table-column label="Options" align="right">
                <template #default="scope">
                  <el-button
                    type="primary"
                    icon="el-icon-d-arrow-right"
                    size="mini"
                    @click="
                      $inertia.get(route(`${routeName}.show`, [scope.row.id]))
                    "
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
    data: Object,
  },

  data() {
    return {
      routeName: 'admin.order',
      name: 'Siparişler',
    }
  },
}
</script>
