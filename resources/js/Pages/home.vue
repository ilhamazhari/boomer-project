<template>
	<layout>
		<template v-slot:top-navbar></template>

		<template v-slot:default>
			<vue-web-cam></vue-web-cam>

			<select v-model="camera">
        <option>-- Select Device --</option>
        <option v-for="device in devices" :key="device.deviceId" :value="device.deviceId">{{ device.label }}</option>
      </select>
		</template>

		<template v-slot:sidebar>
			<ul class="nav flex-column">
						<li class="nav-item"> Join Room</li>
						<li class="nav-item"> Create Room</li>
					</ul>
		</template>
	</layout>
</template>


<script>
import {WebCam} from 'vue-web-cam'
import Layout from '../Shared/Layout'

export default {
	components: {
		Layout,
		'vue-web-cam': WebCam,
	},
}
</script>