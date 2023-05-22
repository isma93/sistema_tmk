//const currency (variable) puede funcionar para formatear la moneda
const currency = function(number){
        return new Intl.NumberFormat('en-ES', {style: 'currency',currency: 'USD', minimumFractionDigits: 2}).format(number);
      };

        //Este metodo redondea a 2 decimales precisos 1.005 - 1.01 por coma flotante. 
        function round(num) {
        
          var m = Number((Math.abs(num) * 100).toPrecision(15));
         var rounded = (Math.round(m) / 100 * Math.sign(num)); 
        
         return Number(rounded);

   }

   const ParseSQL_Num = function (mont)
   {
    mont = mont.replace('$', '');
    mont = mont.replace(' ', ''); 
    mont = mont.replace(',', ''); 
    return mont;    
   }