export default (subdirectory) =>
    (component) =>
    () => import(
        /* webpackMode: "lazy-once" */
        /* webpackChunkName: "dashboard" */
        `../views/dashboard/${subdirectory}/${component}`
    )
