import mix from "laravel-mix";

mix.js("resources/js/app.js", "public/js")
    .postCass("resources/css/app.css", "public/css")
    .webpackConfig({
        resolve: {
            alias: {
                "@": path.resolve("resources/js"),
            },
        },
    });
mix.options({
    hmrOptions: {
        host: "localhost",
        port: 8080,
    },
});
