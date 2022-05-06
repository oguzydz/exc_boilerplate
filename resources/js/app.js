require("./bootstrap");

// Import modules...
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import ElementPlus from "element-plus";
import locale from "element-plus/lib/locale/lang/tr";
import Maska from "maska";
import { Link } from '@inertiajs/inertia-vue3'
import CIcon from '@coreui/icons-vue'
import { iconsSet as icons } from '@/assets/icons'

import moment from 'moment';
moment.locale('tr');

import "element-plus/lib/theme-chalk/index.css";
import "@coreui/coreui/dist/css/coreui.min.css";
import "@coreui/coreui/dist/js/coreui.bundle.min.js";
import "@coreui/chartjs/dist/js/coreui-chartjs.bundle.js";
import "@coreui/utils/dist/coreui-utils.js";
import CoreuiVue from '@coreui/vue'

const el = document.getElementById("app");

const userStatus = (status) => {
    const list = [
        {
            title: "Yeni Üye",
            tag: "info",
        },
        {
            title: "Aktif Üye",
            tag: "success",
        },
        {
            title: "Pasif",
            tag: "info",
        },
        {
            title: "Silindi",
            tag: "info",
        },
        {
            title: "Başvuru Formunu Doldurdu",
            tag: "info",
        },
        {
            title: "Reddedildi",
            tag: "info",
        },
    ];

    return list[status];
};

const productStatus = (status) => {
    const list = [
        {
            title: "Silinmiş",
            tag: "info",
        },
        {
            title: "Aktif",
            tag: "success",
        },
        {
            title: "Pasif",
            tag: "info",
        },
    ];

    return list[status];
};

const booleanStatus = (status) => {
    const list = [false, true];
    return list[status];
};

const errorsToMessage = (errors) => {
    let $errorBag = [];
    Object.keys(errors).map(function (value, key) {
        $errorBag += errors[value] + "<br>";
    });

    return $errorBag;
};

const imageUrlAlt = (event) => {
    event.target.src = "";
};

const pluralText = (text) => {
    const larRegex =
        /[aıou]$|[aıou][bcçdfgğhjklmnprsştvwxyz']$|[aıou][bcçdfgğhjklmnprsştvwxyz][bcçdfgğhjklmnprsştvwxyz]$/i;
    const lerRegex =
        /[eiöü]$|[eiöü][bcçdfgğhjklmnprsştvwxyz']$|[eiöü][bcçdfgğhjklmnprsştvwxyz][bcçdfgğhjklmnprsştvwxyz]$/i;

    if (text.match(larRegex)) {
        text += "lar";
    }
    if (text.match(lerRegex)) {
        text += "ler";
    }

    return text;
};

function isMobile() {
    if (
        /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
            navigator.userAgent
        )
    ) {
        return true;
    } else {
        return false;
    }
}

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, app, props, plugin }) {
        const vueapp = createApp({ render: () => h(app, props) })
            .mixin({
                methods: {
                    route,
                    userStatus,
                    productStatus,
                    booleanStatus,
                    errorsToMessage,
                    imageUrlAlt,
                    pluralText,
                    isMobile,
                    // moment: (value) => moment(value),
                    handlePagination(page, routeName) {
                        this.$inertia.get(route(routeName), {
                            page: page,
                        });
                    },
                    confirmDelete(id, routeName, title = 'Bu öğeyi silmek üzeresiniz, devam edecek misiniz?') {
                        this.$confirm(
                            title,
                            "UYARI!",
                            {
                                confirmButtonText: "OK",
                                cancelButtonText: "İptal",
                                type: "warning",
                            }
                        )
                        .then(() => {
                                this.$inertia.post(
                                    route(routeName, id),
                                    this.data,
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
                },
            })
            .use(ElementPlus, { locale })
            .use(plugin)
            .use(Maska)
            .use(CoreuiVue)
            .provide('icons', icons)
            .component('CIcon', CIcon)
            .use(Link);

            vueapp.config.globalProperties.$moment=moment;

            vueapp.mount(el)

    },
});



InertiaProgress.init({ color: "#f00" });
