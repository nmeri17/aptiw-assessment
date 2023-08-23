const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  pluginOptions: {
    apollo: {
      enableMocks: true,
      enableEngine: false
    }
  }
})
