<template>
  <div>
    <input v-model="name" placeholder="Your Good Name" />
    <vue-dropzone
      ref="myVueDropzone"
      id="dropzone"
      :options="dropzoneOptions"
      v-on:vdropzone-sending="sendingEvent"
    ></vue-dropzone>
    <button v-on:click="processQueue">Greet</button>
  </div>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
  name: "HelloWorld",
  components: {
    vueDropzone: vue2Dropzone
  },
  data: function() {
    return {
      name: "",
      dropzoneOptions: {
        url: "http://127.0.0.1:8000/api/image/upload/store",
        thumbnailWidth: 150,
        maxFilesize: 0.5,
        headers: { "My-Awesome-Header": "header value" },
        autoProcessQueue: false,
        uploadMultiple: true,
        maxFiles: 5,
        parallelUploads: 5
      }
    };
  },
  props: {
    msg: String
  },
  methods: {
    processQueue() {
      this.$refs.myVueDropzone.processQueue();
    },
    sendingEvent(file, xhr, formData) {
      formData.append("name", this.name);
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
