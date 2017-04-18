<script type="text/javascript">
  var hamStatus = false
  var hamMenu = window.document.getElementsByClassName('ham-menu')[0]
  var hamMenuNeighbor = window.document.getElementsByClassName('ham-menu-neighbor')[0]
  var hamMenuControl = window.document.getElementsByClassName('ham-menu-control')[0]
  hamMenuNeighbor.onclick = function(event){
    console.log(event.target.className)
    if(event.target.className !== 'ham-menu-control' && hamStatus)
      hamMenuControl.click()
  }
  hamMenuControl.onclick = function() {
    if(hamStatus){
      hamMenu.style.width = '0'
    } else {
      hamMenu.style.width = '200px'
    }
    hamStatus = !hamStatus
  }
</script>
<script type="text/javascript">
  var thumbnails = window.document.getElementsByClassName('thumbnail')
  for (var x=0;x<thumbnails.length;x++){
    thumbnails[x].onclick = showPhoto.bind(thumbnails[x])
  }
  function showPhoto(){
    window.document.getElementById('show').style.cssText = this.style.cssText;
    window.document.getElementById('name').innerText = this.id
  }
  if(thumbnails.length > 0)
    thumbnails[0].click()
</script>
<script type="text/javascript">
  function toggleHamSubMenu(id){
    window.document.getElementById(id).classList.toggle("display-none");
  }
</script>
