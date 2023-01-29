
const routesData = [        {
    path: '/',
    name: 'homepage',
    show: 'home',
    id: '1'
},
{
    path: '/contatti',
    name: 'contacts',
    show:'contacts',
    id: '2',
},
{
    path: '/chi_siamo',
    name: 'about',
    show: 'about',
    id: '3',
},
{
    path: '/progetti',
    name: 'projects',
    show: 'progetti',
    id: '4',
}

];

const baseUrl = 'http://127.0.0.1:8000/api/projects/' ;

export {routesData , baseUrl}
