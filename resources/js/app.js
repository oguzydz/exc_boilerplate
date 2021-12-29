require("./bootstrap");

// Import modules...
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import ElementPlus from "element-plus";
import locale from "element-plus/lib/locale/lang/tr";
import Maska from "maska";
import { Link } from '@inertiajs/inertia-vue3'

import moment from 'moment';
moment.locale('tr');

import "element-plus/lib/theme-chalk/index.css";
import "@coreui/coreui/dist/css/coreui.min.css";
import "@coreui/coreui/dist/js/coreui.bundle.min.js";
import "@coreui/chartjs/dist/js/coreui-chartjs.bundle.js";
import "@coreui/utils/dist/coreui-utils.js";


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
            title: "Silindi",
            tag: "info",
        },
        {
            title: "Başvuru Formunu Doldurdu",
            tag: "info",
        },
        {
            title: "Pasif",
            tag: "info",
        },
        {
            title: "Reddedildi",
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
    event.target.src = "/img/placeholder.jpg";
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

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, app, props, plugin }) {
        const vueapp = createApp({ render: () => h(app, props) })
            .mixin({
                methods: {
                    route,
                    userStatus,
                    booleanStatus,
                    errorsToMessage,
                    imageUrlAlt,
                    pluralText,
                    // moment: (value) => moment(value),
                    handlePagination(page, routeName) {
                        this.$inertia.get(route(routeName), {
                            page: page,
                        });
                    },
                    confirmDelete(id, routeName) {
                        this.$confirm(
                            "Bu öğeyi silmek üzeresiniz, devam edecek misiniz?",
                            "Uyarı",
                            {
                                confirmButtonText: "OK",
                                cancelButtonText: "İptal",
                                type: "warning",
                            }
                        )
                            .then(() => {
                                this.$inertia.post(
                                    route(`${routeName}.destroy`, id),
                                    {
                                        onSuccess: () => {
                                            this.$message({
                                                type: "success",
                                                message:
                                                    "İşlem başarıyla tamamlandı.",
                                            });
                                        },
                                        onError: (errors) => {
                                            this.$message({
                                                type: "error",
                                                dangerouslyUseHTMLString: true,
                                                message:
                                                    "Hata: Aşağıda yazan sorunları düzeltmelisiniz. <br><br>" +
                                                    errorsToMessage(errors),
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
            .use(Link);

            vueapp.config.globalProperties.$moment=moment;

            vueapp.mount(el)

    },
});



InertiaProgress.init({ color: "#f00" });
