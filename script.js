function showGreeting() {
    var name = document.getElementById('name').value;
    var greetingDiv = document.getElementById('greeting');
    
    if (name) {
        greetingDiv.innerHTML = 'Olá, ' + name + '! Bem-vindo à Página Interativa.';
        greetingDiv.style.display = 'block';
        document.getElementById('user-input').style.display = 'none';
    } else {
        alert('Por favor, digite seu nome.');
    }
}
function showSignUp() {
    document.getElementById('signup-modal').style.display = 'block';
}

function closeSignUp() {
    document.getElementById('signup-modal').style.display = 'none';
}
// Função para criar uma cena 3D ao clicar na imagem
function open3DView(imageSrc) {
    // Cria um elemento de contêiner para a cena 3D
    var container = document.createElement('div');
    container.id = '3d-container';
    document.body.appendChild(container);

    // Configuração básica da cena Three.js
    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    var renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    container.appendChild(renderer.domElement);

    // Adiciona uma esfera para simbolizar a imagem 3D
    var geometry = new THREE.SphereGeometry(5, 32, 32);
    var texture = new THREE.TextureLoader().load(imageSrc);
    var material = new THREE.MeshBasicMaterial({ map: texture });
    var sphere = new THREE.Mesh(geometry, material);
    scene.add(sphere);

    // Posiciona a câmera
    camera.position.z = 10;

    // Função de animação
    function animate() {
        requestAnimationFrame(animate);
        sphere.rotation.x += 0.01;
        sphere.rotation.y += 0.01;
        renderer.render(scene, camera);
    }

    // Inicia a animação
    animate();

    // Fecha a cena 3D quando clicar fora dela
    container.addEventListener('click', function () {
        container.remove();
    });
}

// Adiciona um evento de clique para cada imagem na grade
var imageItems = document.querySelectorAll('.image-item');
imageItems.forEach(function (item) {
    item.addEventListener('click', function () {
        var imageSrc = this.querySelector('img').src;
        open3DView(imageSrc);
    });
});
