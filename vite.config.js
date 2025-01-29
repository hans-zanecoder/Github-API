import { defineConfig } from 'vite';

export default defineConfig({
  root: 'resources', // Laravel's resources directory for Blade files
  build: {
    outDir: '../public', // Output compiled files to Laravel's public folder
    assetsDir: 'assets', // Store assets like CSS/JS in an assets directory inside public
  },
});
