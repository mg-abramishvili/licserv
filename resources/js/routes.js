import AllKeys from './components/Keys/AllKeys.vue';
import AddKey from './components/Keys/AddKey.vue';
import EditKey from './components/Keys/EditKey.vue';
import ViewKey from './components/Keys/ViewKey.vue';

export const routes = [
    {
        name: 'keys',
        path: '/',
        component: AllKeys
    },
    {
        name: 'key-add',
        path: '/keys/add',
        component: AddKey
    },
    {
        name: 'key-edit',
        path: '/keys/edit/:id',
        component: EditKey
    },
    {
        name: 'key-view',
        path: '/keys/view/:id',
        component: ViewKey
    },
];