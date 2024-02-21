// const formulario= document.getElementById('formulario');

// formulario.addEventListener("submit",e=>{
// 	e.preventDefault();

// 	let datos= new FormData(formulario);
    

// fetch('servidor.php',{
// 	method:'POST',
// 	body:datos
// })
// .then(res=>res.json())
// .then(data=>{
// 	console.log(data)
// })

// })



// function base64ToBytes(base64) {
//   const binString = atob(base64);
//   return Uint8Array.from(binString, (m) => m.codePointAt(0));
// }

fetch('database.php',{
	method:'GET'
})
.then(res=>res.json())
.then(data=>{
	
	// console.log(data)
	const ima= document.getElementById('hola')
	// const ss=`data:image/jpg;base64,${data[1].imagen}`

    // ima.src=ss
    ima.src=data[1].imagen


// const decoder= new TextDecoder().decode(base64ToBytes(data[1].imagen))
// console.log(decoder)

// var blobObj = new Blob([decoder], { type: 'image/jpeg'});
// console.log(blobObj)

// var url = URL.createObjectURL(blobObj);
// ima.src=url;

	})

