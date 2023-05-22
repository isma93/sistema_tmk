function valideKey(evt){
          
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // i  s a number.
      return true;
    } else if (code == 46)//punto es 46
  {
    return true;
  }
  else{ // other keys.
      return false;
    }
}
  
