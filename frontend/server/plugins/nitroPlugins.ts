import { RenderResponse } from "nitropack";

export default defineNitroPlugin((nitroApp) => {
  // Delete X-Powered-By from response header
  nitroApp.hooks.hook('render:response', (response: RenderResponse) => {
    for (const headerName in response.headers) {
      if (headerName.toUpperCase() === 'X-POWERED-BY') {
        delete response.headers[headerName];
        break
      }
    }
  })
})
