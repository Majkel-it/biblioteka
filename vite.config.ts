import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

export default defineConfig({
  base: '/aqua-haven-design/', // Zmień na dokładną nazwę repo!
  plugins: [react()],
})
