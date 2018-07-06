var mainText = document.getElementById("txtUrl");
var subnitBtn = document.getElementById("btnNext");

function submitClick() {
	var firebaseRef = firebase.database().ref();
	firebaseRef.child("Text").set("Some Value");
}