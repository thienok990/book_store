import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        host: "localhost",
        port: 5173,
        origin: "http://localhost:5173",
        cors: {
            origin: ["http://localhost:8000"],
            methods: ["GET", "POST"],
            allowedHeaders: ["Content-Type", "Authorization"],
        },
        hmr: {
            host: "localhost",
        },
    },
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
