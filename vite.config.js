import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  root: 'resources', // Laravel's resources directory for Blade files
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  build: {
    outDir: 'public/build',
    manifest: true,
  },
  server: {
    https: true,
    host: '0.0.0.0',
  },
});
