module.exports = {
  devServer: {
    proxy: {
      "^/api": {
        target: "http://127.0.0.1:8000/api/v1/",
        changeOrigin: true,
        logLevel: "debug",
        pathRewrite: { "^/api": "/" },
      },
    },
  },
};
