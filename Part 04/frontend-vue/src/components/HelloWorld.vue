<template>
  <div>
    <input v-model="name" placeholder="Enter Your Name" />
    <vue-dropzone
      ref="myVueDropzone"
      id="dropzone"
      :options="dropzoneOptions"
      @vdropzone-sending="vsending"
      @vdropzone-mounted="vmounted"
    ></vue-dropzone>
    <button @click="startProcessingQueue()">Send</button>
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
        thumbnailWidth: 300,
        maxFilesize: 0.5,
        headers: { "My-Awesome-Header": "header value" },
        autoProcessQueue: false,
        parallelUploads: 5,
        uploadMultiple: true,
        maxFiles: 5
      }
    };
  },
  props: {
    msg: String
  },
  methods: {
    startProcessingQueue() {
      this.$refs.myVueDropzone.processQueue();
    },
    vsending(file, xhr, formData) {
      formData.append("name", this.name);
    },
    vmounted() {

      // nextTick is a vuejs function 
      // Read about it here: https://stackoverflow.com/questions/47634258/what-is-nexttick-or-what-does-it-do-in-vuejs
      this.$nextTick(function() {
        // Properties of the file which we want to add. These are static. You should calculate them dynamically 
        var file = { size: 123, type: "image/png" };
        
        // url of the file 
        var url = "https://rowanwins.github.io/vue-dropzone/docs/dist/vue2-dropzone1.png";
        
        // add file to vue dropzone
        this.$refs.myVueDropzone.manuallyAddFile(file, url);
      });
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