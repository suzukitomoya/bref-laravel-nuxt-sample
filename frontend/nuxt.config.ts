const publicEnv = require(`./env.public.${process.env.NODE_ENV}`)

// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  nitro: {
    preset: 'aws-lambda',
    serveStatic: true,
  },
  runtimeConfig: {
    public: { ...publicEnv },
  }
})
