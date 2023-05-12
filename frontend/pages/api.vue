<script setup lang="ts">
import {User, UserListResponse} from "~/types";
// TODO: Nuxt3はrefを自動インポートするが、IntelliJが自動インポートをまだ正しく認識しないため、補完のためには明示的にインポートする必要がある
//  「Nuxt auto import」とかでissue検索（https://youtrack.jetbrains.com/issues?q=nuxt%20auto%20import）するとたくさん出てくる。JetBrains側の反応あるissueもあるが理解していなさそう…
//  https://youtrack.jetbrains.com/issue/WEB-60970/Nuxt-3-useState-Unresolved-variable
//  https://youtrack.jetbrains.com/issue/WEB-60702/Vue-Nuxt-ref-type-is-unknown-in-template
//  https://youtrack.jetbrains.com/issue/WEB-55509/refs-type-not-inferred-in-templates-when-using-webpack-auto-import
//  https://youtrack.jetbrains.com/issue/WEB-58106/Nuxt-3-IDE-doesnt-recognize-the-correct-types-when-auto-importing-components-functions
import {ref} from "vue";

const config = useRuntimeConfig()
const users = ref<User[]>()

const headers = useRequestHeaders(['cookie'])
// const { data, error } = await useFetch<UserListResponse>('/api/users', { baseURL: config.public.apiBaseUrl }) // NOTE: baseURLを指定するとfailed fetchエラーになる原因不明
const { data } = await useFetch<UserListResponse>(`${config.public.apiBaseUrl}/api/users`, { headers })
users.value = data.value?.users
</script>

<template>
  <div>
    <h2>API Page</h2>
    <ul>
      <li v-for="user in users" :key="user.id">{{ user.name }}</li>
    </ul>
  </div>
</template>
