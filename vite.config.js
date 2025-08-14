import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: "localhost", // bắt Vite server trên localhost
        port: 5173, // port dev Vite
        hmr: {
            host: "localhost", // đồng bộ HMR với Laravel
        },
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
