import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import { Each } from "@/Components/Each";

export default function Likes({ auth, response }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Likes
                </h2>
            }
        >
            <Head title="Likes" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="flex flex-wrap gap-5 justify-center py-5">
                            <Each
                                of={response}
                                render={(item, index) => (
                                    <div className="bg-slate-600 p-5 rounded-md">
                                        <img
                                            src={item.image_url}
                                            className="w-80 h-80 rounded-md"
                                        />
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
