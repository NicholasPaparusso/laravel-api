const truncateStr = (string) => {
  if(string.length > 120){
     return string.substr(0,120) + '...'
  }else{
      return string
  }
}

export {truncateStr}