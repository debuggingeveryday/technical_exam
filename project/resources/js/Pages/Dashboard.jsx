import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { useEffect, useState, useRef } from "react";
import { Each } from "@/Components/Each";
import { router } from "@inertiajs/react";

export default function Dashboard({ auth }) {
    const [dogList, setDogList] = useState([]);
    const imageRef = useRef([]);

    useEffect(() => {
        async function fetchData() {
            const response = await fetch(
                "https://dog.ceo/api/breeds/image/random/3"
            );

            return await response.json();
        }
        (async () => {
            const responseData = await fetchData();
            setDogList(responseData.message);
        })();
    }, []);

    const like = (index, item) => {
        // hide image when added (click the like botton)
        imageRef[index].classList.add("hidden");
        router.post(route("your-likes.like"), { image_url: item });
    };

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
                                    <div
                                        ref={(element) =>
                                            (imageRef[index] = element)
                                        }
                                        className="bg-gray-500 p-5 rounded-md transition duration-200 border-4 border-gray-500 hover:border-4 hover:border-blue-500"
                                    >
                                        <img
                                            src={item}
                                            className="w-80 h-80 rounded-md"
                                        />
                                        <button
                                            onClick={() => like(index, item)}
                                        >
                                            <span className="text-slate-800 text-lg">
                                                Like
                                                <i className="nf nf-md-thumb_up ml-1"></i>
                                            </span>
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
