<template>
	<layout>
		<template v-slot:top-navbar></template>

		<template v-slot:default>
			<vue-web-cam ref="webcam" :device-id="deviceId" width="100%" @started="onStarted" @stopped="onStopped" @error="onError" @cameras="onCameras" @camera-change="onCameraChange" />

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
	data() {
	  return {
      img: null,
      camera: null,
      deviceId: null,
      devices: []
    };
  },
  computed: {
		device: function() {
      return this.devices.find(n => n.deviceId === this.deviceId);
    }
  },
  watch: {
    camera: function(id) {
			this.deviceId = id;
		},
    devices: function() {
      // Once we have a list select the first one
      const [first, ...tail] = this.devices;
      if (first) {
        this.camera = first.deviceId;
        this.deviceId = first.deviceId;
			}
		}
  },
  methods: {
    onCapture() {
      this.img = this.$refs.webcam.capture();
    },
    onStarted(stream) {
      console.log("On Started Event", stream);
    },
    onStopped(stream) {
      console.log("On Stopped Event", stream);
    },
    onStop() {
      this.$refs.webcam.stop();
    },
    onStart() {
      this.$refs.webcam.start();
    },
    onError(error) {
      console.log("On Error Event", error);
    },
    onCameras(cameras) {
      this.devices = cameras;
      console.log("On Cameras Event", cameras);
    },
    onCameraChange(deviceId) {
      this.deviceId = deviceId;
      this.camera = deviceId;
      console.log("On Camera Change Event", deviceId);
    }
  }
}
</script>