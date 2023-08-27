<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
		tasks: {
				type: Object,
				default: () => ({}),
		}
});
const form = useForm({});

function destroy(id) {
		if (confirm("Are you sure you want to Delete")) {
				form.delete(route('tasks.destroy', id));
		}
}

const categories = [];
</script>

<template>

	<Head title="Tasks" />

<BreezeAuthenticatedLayout>
				<template #header>
						<h2 class="text-xl font-semibold leading-tight text-gray-800">
								All Tasks
						</h2>
				</template>

				<div class="py-12">
						<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
								<div
										v-if="$page.flash && $page.flash.message"
										class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
										role="alert"
								> <!-- this is added by inertia through providers/appServiceProvider -->
										<span class="font-medium">
												{{ $page.flash.message }}
										</span>
								</div>
								<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
										<div class="p-6 bg-white border-b border-gray-200">
											 <div class="mb-2">
														<Link :href="route('tasks.create')">
																<PrimaryButton>Add Task</PrimaryButton></Link
														>
												</div>
												 <div
														class="relative overflow-x-auto shadow-md sm:rounded-lg"
												>
														<table
																class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
														>
																<thead
																		class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
																>
																		<tr>
																				<th scope="col" class="px-6 py-3">#</th>
																				<th scope="col" class="px-6 py-3">
																						Title
																				</th>
																				<th scope="col" class="px-6 py-3">
																						Status
																				</th>
																				<th scope="col" class="px-6 py-3">
																						description
																				</th>
																				<th scope="col" class="px-6 py-3">
																						due_date
																				</th>
																				<th scope="col" class="px-6 py-3">
																						Category
																				</th>
																				<th scope="col" class="px-6 py-3">
																						Edit
																				</th>
																				<th scope="col" class="px-6 py-3">
																						Delete
																				</th>
																		</tr>
																</thead>
																<tbody>
																		<tr
																				v-for="task in tasks"
																				:key="task.id"
																				class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
																		>
																				<th
																						scope="row"
																						class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
																				>
																						{{ task.id }}
																				</th>
																				<th
																						scope="row"
																						class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
																				>
																						{{ task.title }}
																				</th>
																				<td class="px-6 py-4">
																						{{ task.status }}
																				</td>
																				<td class="px-6 py-4">
																						{{ task.description }}
																				</td>
																				<td class="px-6 py-4">
																						{{ task.due_date }}
																				</td>
																				<td class="px-6 py-4">
																						{{ task.category.name }}
																				</td>


																				<td class="px-6 py-4">
																						<Link
																								:href="
																										route(
																												'tasks.edit',
																												task.id
																										)
																								"
																							 class="px-4 py-2 text-white bg-blue-600 rounded-lg" >Edit</Link
																						>
																				</td>
																				<td class="px-6 py-4">
																						<PrimaryButton
																								class="bg-red-700"
																								@click="destroy(task.id)"
																						>
																								Delete
																						</PrimaryButton>
																				</td>
																		</tr>
																</tbody>
														</table>
												</div>
										</div>
								</div>
						</div>
				</div>

				
		</BreezeAuthenticatedLayout>
</template>