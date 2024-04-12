import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { useEffect, useState } from "react";
import { Each } from "@/Components/Each";

export default function Dashboard({ auth }) {
    const [dogList, setDogList] = useState([]);

    useEffect(() => {
        async function fetchData() {
            const response = await fetch(
                "https://dog.ceo/api/breeds/image/random/3"
            );
            const data = await response.json();
            return data;
        }
        (async () => {
            const responseData = await fetchData();
            setDogList(responseData.message);
        })();
    }, []);

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="flex flex-wrap gap-5 justify-center py-5">
                            <Each
                                of={dogList}
                                render={(item, index) => (
                                    <div className="bg-slate-600 p-5 rounded-md">
                                        <img
                                            src={item}
                                            className="w-80 h-80 rounded-md"
                                        />
                                        <button>
                                            Like{" "}
                                            <i className="nf nf-md-thumb_up"></i>
                                        </button>
                                    </div>
                                )}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
